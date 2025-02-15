<div id="question-<?php echo $entity->getKey(); ?>">
    <div>
        <a href="javascript:void(0)" onclick="$('#question-<?php echo $entity->getKey(); ?> .theory').toggle();">Show Theory</a>
    </div>
    <div class="theory" style="display: none;">
        <?php echo $entity->getTheory(); ?>
    </div>
    <?php echo $test; ?>
</div>