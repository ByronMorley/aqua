
<div class="pane content aq-activity aq-question-activity" id="activity-$ID" data-object="Question" data-correct="$correctAnswerCount">
	<div class="pane aq-question">
    $Question
</div>
    <div class="pane aq-image">
        $Image
    </div>
	<div class="pane">
		<div class="section right aq-rule">
			<span>$questionRuleText</span>
		</div>
	</div>
	<div class="pane aq-explanation">
	</div>
    <% if $Answers %>
		<div class="pane aq-answers">
			<ul>
                <% loop $Answers %>
					<li class="pane aq-selectable" id="answer-$ID" data-number="$Pos" data-answer="$CorrectAnswer">
                        <span class="section left aq-icons">
                            <!--Keep empty icons injected here -->
                        </span>
						<span class="section left aq-answer-text">
                            $AnswerText
						</span>
					</li>
                <% end_loop %>
			</ul>
		</div>
    <% end_if %>

</div>
