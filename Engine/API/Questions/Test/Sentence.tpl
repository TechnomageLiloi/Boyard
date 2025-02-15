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

    <a href="javascript:void(0)" onclick="Testing.checkSentence('<?php echo $entity->getKey(); ?>');">Check</a>
    <hr/>
    <div class="sentence">
        <?php $sentence = $entity->getElementStylo('sentence'); ?>

        <?php foreach($sentence as $block): ?>
            <?php if(str_starts_with($block, '==')): ?>
                <input type="text" data-correct="<?php echo str_replace('==', '', $block); ?>">
            <?php else: ?>
                <?php echo $block; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>