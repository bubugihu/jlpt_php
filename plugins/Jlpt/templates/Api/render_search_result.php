<?php if(!empty($data)): ?>
    <?php foreach ($data as $key => $value): ?>
        <ul class="recent-searches">
            <li><a>Kỳ thi: <?= $value->exam_display ?></a></li>
            <li><a><?= $value->full_name_display ?></a></li>
            <li><a><?= strtoupper($value->level) ?></a></li>
            <li><a><?= $value->birthday_display ?> </a></li>
            <li><a><?= $value->phone ?></a></li>
        </ul>
        <ul class="recent-searches">
            <li><a>Số báo danh: <?= $value->code_number ?></a></li>
            <li><a>Trường thi: <?= $value->university->name ?></a></li>
            <li><a>Địa chỉ trường thi: <?= $value->university->addr ?></a></li>
            <li><a>Phòng thi: <?= $value->room ?> </a></li>
        </ul>
        <ul class="recent-searches">
            <?= $value->university->iframe ?>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>
