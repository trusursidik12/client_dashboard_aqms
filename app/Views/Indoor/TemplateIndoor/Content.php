<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('Indoor/TemplateIndoor/Header') ?>
    <?= $this->renderSection('sectionheader') ?>
</head>

<body>
    <?= $this->renderSection('sectioncontent') ?>

    <?= $this->include('Indoor/TemplateIndoor/Js') ?>
    <?= $this->renderSection('sectionjs') ?>
</body>

</html>