<div class="content">
        <div class="content_padding">
            <a href="/" class="new-poll">Create new poll</a>
            <h1>
                <?= $poll['poll']['question'];?>
            </h1>
            <?php if(!$has_poll):?>
            <form action="/poll/<?=$poll['id']?>" method="post">
                <div class="form-group">
                    <label for="question">Your name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <?php foreach ($poll['poll']['answer'] as $answer):?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" value="<?=$answer?>" required>
                        <label class="form-check-label" for="answer"><?=$answer?></label>
                    </div>
                <?php endforeach;?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <?php endif;?>
    <div id="result">
        <?php include('result.php'); ?>
    </div>
</div>