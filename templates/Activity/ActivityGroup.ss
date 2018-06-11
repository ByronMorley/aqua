<% require css('components/font-awesome/css/font-awesome.min.css') %>
<% require css('booteek/css/style.min.css') %>
<% require css('aqua/css/style.min.css') %>


<% require javascript('twitter/bootstrap/dist/js/bootstrap.bundle.min.js') %>
<% require javascript('components/jquery/jquery.min.js') %>
<% require javascript('components/jqueryui/jquery-ui.min.js') %>
<% require javascript('aqua/js/main.min.js') %>
<% require javascript('aqua/app/dist/bundle.js') %>

<div id="aqua-$ID" class="aq-activity-main" data-options=$dataOptions>
	<div class="pane">
		<div class="pane header">
            <span class="title">
                $Title
			</span>
		</div>
		<div class="aq-main-pane">
			<div class="pane content aq-upper-section">
				<div class="section left aq-intro"></div>
				<div class="section right aq-score"></div>
			</div>
			<ul class="aq-activities">
                <% loop $Activities %>
					<li>
                        $Me
					</li>
                <% end_loop %>
			</ul>
			<div class="pane content aq-lower-section">
				<div class="section right aq-buttons">
					<button id="aq-confirm-$ID" class="inactive aq-confirm">Confirm</button>
					<button class="inactive aq-next" id="aq-next-$ID">Next</button>
				</div>
			</div>
		</div>
	</div>
	<div class="pane content aq-final-pane">
		<h3>Activity Completed</h3>
		<span class="aq-final-score"></span>
		<button class="aq-try-again">Try Again</button>
	</div>
</div>