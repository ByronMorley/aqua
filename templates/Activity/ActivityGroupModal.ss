<% require css('twitter/bootstrap/dist/css/bootstrap.min.css') %>
<% require css('components/font-awesome/css/font-awesome.min.css') %>
<% require css('booteek/css/style.min.css') %>
<% require css('aqua/css/style.min.css') %>

<% require javascript('twitter/bootstrap/dist/js/bootstrap.bundle.min.js') %>
<% require javascript('aqua/app/dist/bundle.js') %>

<div class="block text-block">
	<div class="panel rounded content">
        <% if $ShowTitle %>
			<h2>$Title</h2>
        <% end_if %>
        $Content
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#aqua-$ID">Start Activity
		</button>
	</div>
</div>


<!-- The Modal -->
<div id="aqua-$ID" class="aq-activity-main aq-modal modal fade" role="dialog" data-options=$dataOptions>
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
                 <span class="title">
                     $Title
				 </span>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="aq-main-pane ">
					<div class="pane content aq-upper-section">
						<div class="section left aq-intro">
						</div>
						<div class="section right aq-score">
						</div>
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
				<div class="pane content aq-final-pane">
					<h3>Activity Completed</h3>
					<span class="aq-final-score"></span>
					<button class="aq-try-again">Try Again</button>
				</div>
			</div>

			<div class="modal-footer pane round bottom">
				<button id="modal-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>

		<!-- Modal footer -->

	</div>
</div>
</div>
<!-- END MODAL -->
<script>
	$(document).ready(function () {
		$('.aq-modal').modal('show');
	});
</script>