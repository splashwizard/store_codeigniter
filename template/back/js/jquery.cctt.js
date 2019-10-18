/*
 * Handle multilevel folding of TABLE
 * 
 * A TR with class 'cctt-expanded' or 'cctt-collapsed' gets
 *  a fold-state indicator in TD with class 'cctt-control'
 *  and related behaviour
 * 
 * There are performance considerations that hint to avoid visibility tests,
 *  so none assumptions are enforced while computing tags attributes, just classes.
 * 
 * On large tables (I'm speaking about 10K rows), you're better to instantiate
 *  with only top level parts visible
 * 
 * author: Capelli Carlo
 * license: MIT
 */

;(function($) {

    const trace = console.log

    const ctrl = 'cctt-control'
    const k_ctrl = '.cctt-control'

    const exp = 'cctt-expanded'
    const k_exp = '.cctt-expanded'

    const col = 'cctt-collapsed'
    const k_col = '.cctt-collapsed'
    
    var methods = {
        
        // defaults augmented by user
        settings: {},
        
        initializeDOM: function(options) {

            methods.settings = $.extend({}, this.cctt.defaults, options)
            
            // apply on each TBODY
            return this.each(function() {
                $(this).children('TBODY').each(function() {
                    methods.init_tbody($(this))
                })
            })
        },

        // get each sub TR on a TR branch
        row_tree: function(TR) {
            var TD = TR.children('.cctt-control')
            if (TD.length === 1) {
                // level = index of TD.control (should exists)
                var ic = TD.index()
                var rows = []
                TR.nextAll().each(function() {
                    var RS = $(this)

                    // on a control RS ?
                    var CS = RS.children('.cctt-control')
                    if (CS.length === 1) {
                        
                        // bail out ASAP
                        var csi = CS.index()
                        if (csi <= ic)
                            return false    // we're done
                    }
                    rows.push(RS)
                })
                return rows
            }
        },

        structure_layout: function() {
            var pk = []
            $(this).find('tr').each((i, v) => {
                var r = $(v).children('td').map((j, u) => {
                    return $(u).text()
                }).toArray()
                if (pk.length) {
                }
                else
                    pk.push(r)
            })
        },
        
        // implement (kind of) state machine
        //      
        init_tbody: function(TBODY) {

            //var state = { skip: 0, hide: 1, show: 2 }
            
            // use event delegation to deal with toggling classes
            // suggestion by http://stackoverflow.com/a/16547457/874024
            TBODY.on('click', '.cctt-control', function(e) {
                if (methods.settings.stop_propagation)
                    e.stopPropagation()

                methods.toggle_node($(this))
            })
        },

        // 
        toggle_node: function(TD) {

            var state = { skip: 0, hide: 1, show: 2 }
            var TR = $(TD.parent())

            // action = on expanded ? hide : show
            var ac = TR.is('.cctt-expanded') ? state.hide : state.show
            var a0 = ac
            
            // level = index of TD.control (should exists)
            var ic = TD.index()

            // keep a stack
            var st = [{action: ac, level: ic}]
            function top() { return st[st.length - 1] }

            // foreach sibling RS
            TR.nextAll().each(function() {
                var RS = $(this)

                // on a control RS ?
                var CS = RS.children('.cctt-control')
                if (CS.length === 1) {
                    
                    // bail out ASAP
                    var csi = CS.index()
                    if (csi <= ic)
                        return false    // we're done

                    // get the current level status
                    while (top().level >= csi)
                        st.pop()
                    
                    ac = top().action
                    if (RS.is('.cctt-collapsed')) {
                        // assume related rows already set
                        st.push({action: state.skip, level: csi})
                    }
                    else {
                        // hide/show are clearly asymmetric
                        if (a0 === state.hide)
                            st.push({action: a0, level: csi})
                        else
                            st.push({action: ac, level: csi})
                    }
                }
                
                // apply current action to current sibling
                if (ac === state.hide)
                    RS.hide()
                else if (ac === state.show)
                    RS.show()

                // next sibling processing
                ac = top().action
            })
            
            TR.toggleClass('cctt-expanded cctt-collapsed')

            // use custom event to notify of state change
            TR.trigger('cctt:toggle')
        },
        
        // find - if any - the first TD tagged as control cell
        find_control_td: function($tr) {
            const ctrl = $tr.children(k_ctrl)
            return ctrl.length >= 1 ? $(ctrl.get(0)) : null
        },
        
        // expand required branches to make element $el visible
        ensure_visible : function($el) {
            const $ps = methods.find_parents($el).reverse()
            $ps.forEach($tr => {
                if ($tr.is(k_col))
                    methods.toggle_node(methods.find_control_td($tr))
            })
        },
        
        // $child can be either TD or TR
        find_parent : function($child) {
            if ($child.is('TD'))
                $child = $child.closest('TR')
           
            const ctrl = $child.children(k_ctrl)
            if (ctrl.length >= 1) {
                const levc = ctrl.index()
                if (levc > 0) {
                    const p = $child.prevAll('TR.cctt-expanded,TR.cctt-collapsed').find(`td:nth-child(${levc-1}).cctt-control`)
                    if (p.length)
                        return $(p.get(0))
                }
                return null;
            }
            const q = $child.prevAll('TR.cctt-expanded,TR.cctt-collapsed')
            return q.length ? $(q.get(0)) : null
        },

        // get the array of TR parents of $child
        find_parents : function($child) {
            var $parents = [], $parent
            while ($parent = methods.find_parent($child))
                $parents.push($child = $parent)
            return $parents
        },

        // utility currency
        // from https://stackoverflow.com/a/29347112/874024
        parsePotentiallyGroupedFloat : function(value) {
            if (typeof value === 'string') {
                var result = (value = value.trim()).replace(/[^0-9]/g, '')
                if (/[,\.]\d{2}$/.test(value))
                    result = result.replace(/(\d{2})$/, '.$1')
                return parseFloat(result)
            }
            return parseFloat(value)
        },
        
        currency: function(field) {
            var s = $(field).val().trim()
            if (s.length > 0)
                return methods.parsePotentiallyGroupedFloat(s)
            return 0;
        },
        
        fmtcurrency: function(c) {
            var R = methods.parsePotentiallyGroupedFloat(c).toLocaleString('it-IT', {maximumFractionDigits:2, minimumFractionDigits:2})
            return R
        },
        euros: function(field) {
            var c = methods.currency(field)
            var f = methods.fmtcurrency(c)
            return f + " €"
        },
        setcurrency: function(field, c) {
            $(field).val(methods.fmtcurrency(c))
        },
        
    }
    
    // standard dispatch of method
    $.fn.cctt = function(method) {
        if (methods[method]) {
            if (arguments.length == 1)  // 
                return methods[method]
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1))
        }
        if (typeof method === 'object' || !method)  // binding to construct
            return methods.initializeDOM.apply(this, arguments)
        $.error('Method `' + method + '` does not exists for jQuery.cctt')
    }

    $.fn.cctt.defaults = {
        // stop event propagation on expand/collapse event
        stop_propagation: true,
    }
    
})(jQuery);
