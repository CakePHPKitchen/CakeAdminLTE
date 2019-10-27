<div class="row jlr-dashbox">
    <div class="col-sm-12">
        <ul class="timeline">
            <?php $date = ''; ?>
            <?php foreach($timeline as $tline): ?>

            <?php if($date == '' || ($date != \AdminLTE\Utility\Dates::getDayOfMonth($tline->created))) { ?>
            <?php $date = \AdminLTE\Utility\Dates::getDayOfMonth($tline->created); ?>

                <li class="time-label">
                    <span class="<?= \AdminLTE\Utility\Colors::getRandomBGColor() ?>">
                        <?= \AdminLTE\Utility\Dates::getFancyDate($date) ?>
                    </span>
                </li>

            <?php } ?>

            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <i class="<?= $tline->icon ?> <?= $tline->color ?>"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?= $tline->created ?></span>

                    <h3 class="timeline-header"><?= $tline->header ?></h3>

                    <div class="timeline-body"><?= $tline->body ?></div>

                    <div class="timeline-footer">
                        <?= $tline->footer ?>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->

            <?php endforeach; ?>

        </ul>
    </div>
</div>
