<div class="content">
    <h1>
        Create polling
    </h1>
    <form action="/" method="post">
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" name="question" required>
        </div>

        <div class="answers">
            <div class="form-group">
                <label for="answer">Answer 1</label>
                <input type="text" class="form-control" name="answer[]" required>
            </div>

            <div class="form-group">
                <label for="answer">Answer 2</label>
                <input type="text" class="form-control" name="answer[]" required>
            </div>

            <div id="answer" class="form-group answer-added" style="display: none;">
                <label for="answer">Answer <span></span></label>
                <div class="row">
                <div class="col-10">
                    <input type="text" class="form-control" name="answer[]">
                </div>
                <div class="col-2">
                    <button id="remove-answer" class="btn btn-primary add-button" type="button">-</button>
                </div>
                </div>
            </div>
        </div>
        <div>
            <button id="add-answer" class="btn btn-primary add-button" type="button">+</button>
        </div>
        <button type="submit" class="btn btn-primary">Start</button>
    </form>
</div>