<?php echo form_open('settings/save'); ?>					

<div class="row"><!-- // START Row -->

	<div class="panel">

		<!-- Home Page -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Info</h3>
		</div>

		<div class="medium-4 column">
			<h4>Updating Settings</h4>
		</div>

		<div class="medium-8 column">
			<p>You can use basic HTML tags (eg. <code>em</code>, 
			<code>strong</code>, <code>a</code>, etc) when editing 
			your copy and social media text.</p>
		</div>

		<div class="medium-12 column"><hr class="less-margin" /></div>		

		<div class="medium-2 column">
			<h4>Merge Text</h4>
		</div>

		<div class="medium-10 column">
			<p>
				There are specific set of values you can pull directly from 
				the database to use within your site copy / social sharing. 
				The list of options is as follows:
			</p>

			<ul>
				<li><code>{{site_name}}</code> = Name of your site as seen in the title.</li>
				<li><code>{{start_date}}</code> = Start date of your campaign (eg. "January 1, 2016").</li>
				<li><code>{{end_date}}</code> = End date of your campaign (eg. "January 15, 2016").</li>
				<li><code>{{time_left}}</code> = Number of days left in your campaign (eg. "2 days" / "1 day").</li>
				<li><code>{{site_logo}}</code> = Absoute URL to the site logo image from the server.</li>
				<li><code>{{site_color}}</code> = The color value (eg. HEX or RGBA).</li>
				<li><code>{{youtube::<b>[VIDEO_ID]</b>}}</code> = Responsive YouTube embed that hides related videos and unnecessary options.</li>
				<li><code>{{youtube_autoplay::<b>[VIDEO_ID]</b>}}</code> = Same as above but enables autoplay.</li>
				<li><code>{{iframe::<b>[YOUR_URL]</b>}}</code> = Generic iFrame embed. Use this if you need a custom YouTube embed URL for example.</li>
			</ul>

			<p><strong><em>Note: The YouTube ID is found in the page URL and looks like <code>6MsVsem8wjC</code>.</em></strong></p>

			<p>If you mistype or try a non-supported value it will appear "[Error: Not supported]".</p>

			<p><em>Disclaimer: Fields not supported to use merge tags by tag are:</em></p>

			<ul>
				<li>Rewards:
					<ul>
						<li>Emails Required</li>
					</ul>
				</li>
				<li>Design:
					<ul>
						<li>Primary color in design tab</li>
					</ul>
				</li>
				<li>Setup:
					<ul>
						<li>Site Title in the setup tab</li>
						<li>Start and end date</li>
						<li>Tracking inputs</li>
					</ul>
				</li>
				<li>Email: All setings</li>
			</ul>
		</div>					
		
	</div>	

</div><!-- // END Row -->	

<?php echo form_close(); ?>