<?php if(isset($poll['result'])):?>
    <h2>
        Results
    </h2>
    <br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <?php foreach ($poll['poll']['answer'] as $answer):?>
                <th scope="col"><?=$answer?></th>
            <?php endforeach;?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($poll['result'] as $result):?>
            <tr>
                <td><?=$result['name']?></td>
                <?php foreach ($poll['poll']['answer'] as $answer):?>
                    <td><?php if($result['answer'] == $answer) echo 'x'?></td>
                <?php endforeach;?>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php endif;?>