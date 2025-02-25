<div id="question-<?php echo $entity->getKey(); ?>">

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <?php echo $test; ?>
            </td>

            <td style="vertical-align: top;">
                <div>
                    <a href="javascript:void(0)" onclick="$('#question-<?php echo $entity->getKey(); ?> .theory').toggle();">Show trainer</a>
                </div>
                <div class="theory" style="display: none;">
                    <?php echo $entity->getTheory(); ?>
                </div>
            </td>
        </tr>
    </table>

</div>