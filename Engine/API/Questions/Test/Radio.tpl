<style>
    #testing-<?php echo $entity->getKey(); ?>
    {
        border: gray 2px solid;
        padding: 10px;
        border-radius: 5px;
        background-color: #ffffe3;
        margin: 10px;
    }
</style>
<div id="testing-<?php echo $entity->getKey(); ?>">

    <div class="question">
        <a href="javascript:void(0)" onclick="Testing.checkRadio('<?php echo $entity->getKey(); ?>');">Check</a>
        <hr/>
        <?php echo $entity->getElementStylo('question'); ?>
    </div>

    <div class="answer">
        <hr/>
        <?php $answers = $entity->getElement('answers'); ?>
        <?php shuffle($answers); ?>
        <?php foreach($answers as $answer): ?>
            <input type="radio" name="radio-<?php echo $entity->getKey(); ?>" data-correct="<?php echo $answer['correct'] ?? ''; ?>">
            <?php echo $answer['answer']; ?>
            <br/>
        <?php endforeach; ?>
    </div>
</div>