<link href="<?php echo ROOT_URL; ?>/Engine/API/Vertex/Show/Style.css" rel="stylesheet" />
<div id="atoms-show">
    <table>
        <tr>
            <th>Link</th>
            <th>Extension</th>
        </tr>
        <?php foreach($collection as $entity): ?>
            <tr>
                <td>
                    <?php echo $entity->getLink(); ?>
                </td>
                <td>
                    <?php echo $entity->getExtension(); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>