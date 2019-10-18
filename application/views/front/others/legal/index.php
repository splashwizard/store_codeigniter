<!-- BREADCRUMBS -->

<section class="page-section breadcrumbs">

    <div class="container">

        <div class="page-header">

            <h2 class="section-title section-title-lg">

                <span>

                    <?php 

					if($type=='terms_conditions'){

						echo translate('terms_&_condition');

					}

					elseif($type=='privacy_policy'){

						echo translate('privacy_policy');

					}

					?>

                </span>

            </h2>

        </div>

    </div>

</section>

<!-- /BREADCRUMBS -->



<!-- PAGE -->

<section class="page-section">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

            	<?php //echo $this->db->get_where('general_settings', array( 'type' => $type ))->row()->value; ?>
            	<p>At Ryants.com we care about your privacy. </p>
            	<p>We only collect and Maintain certain data from our users that includes information provided when setting up your user account, from answers you provide in surveys or forms.We use data about how our site is being used by using google analytics that anonymously tracks how traffic moves through the site and beyond with cookies and such.  </p>
            	<p>Information collected may be used for the following:</p>
            	<ul>
            		<li>-To improve our website, what we offer and how its presented.</li>
            		<li>-To improve customer service.</li>
            		<li>-We use cookies these allow us to learn about site traffic and site interaction, its about building a better platform.</li>
            		<li>-Any and all information collected is to improve platform performance and user experience. We do not share, sell, trade or transfer your data for third parties to use. Ryants.com may release data if working with a third parties or partners to improve the functioning of our site and services. non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</li>
            		<li>-Ryants.com facilitates buying and selling between users and will maintain required data to complete transactions and provide buyers and sellers records that support the transactions. By making a sale or a purchase on ryants.com, you are authorizing us to share your information in this way.</li>
            		<li>-Ryants.com mayrelease your personal information to law enforcement if we believe in good faith that such disclosure is reasonably necessary to comply with the law, and due process has been followed. </li>
            	</ul>

            </div>

        </div>

    </div>

</section>

<!-- /PAGE -->