<!DOCTYPE html>
<html>
<head>
<title>Genotype Compatibility Checker</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Genotype Compatibility Checker</h1>
<?php
if (isset($_POST['submit'])) {
    $partner1_genotype = $_POST['partner1_genotype'];
    $partner2_genotype = $_POST['partner2_genotype'];

    // Define the genotypes that are not compatible with each other
    $incompatible_genotypes = array(
        'AS' => array('SS'),
        'AS' => array('AS'),
        'SS' => array('AS', 'SS'),
    );

    // Check if the two genotypes are compatible
    if (isset($incompatible_genotypes[$partner1_genotype]) && in_array($partner2_genotype, $incompatible_genotypes[$partner1_genotype])) {
        $compatibility = "Partners' genotypes are not compatible for marriage.";
    } elseif (isset($incompatible_genotypes[$partner2_genotype]) && in_array($partner1_genotype, $incompatible_genotypes[$partner2_genotype])) {
        $compatibility = "Partners' genotypes are not compatible for marriage.";
    } else {
        $compatibility = "Partners' genotypes are compatible for marriage.";
    }
}
?>

<form method="POST">
    <?php if (!empty($compatibility)): ?>
        <span><?php echo $compatibility; ?></span>
    <?php endif; ?>

    <label for="partner1_genotype">Partner 1 Genotype:</label>
    <select id="partner1_genotype" name="partner1_genotype" required>
        <option value="" disabled="disabled" selected="selected">&larr; Select Genotype &rarr;</option>
        <option value="AA">AA</option>
        <option value="AS">AS</option>
        <option value="SS">SS</option>
    </select>
    <br>

    <label for="partner2_genotype">Partner 2 Genotype:</label>
    <select id="partner2_genotype" name="partner2_genotype" required>
        <option value="" disabled="disabled" selected="selected">&larr; Select Genotype &rarr;</option>
        <option value="AA">AA</option>
        <option value="AS">AS</option>
        <option value="SS">SS</option>
    </select>
    <br>

    <input type="submit" name="submit" value="Check Compatibility">
</form>

</body>
</html>