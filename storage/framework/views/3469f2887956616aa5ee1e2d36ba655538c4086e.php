<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 256mm;
        outline: 2cm #FFEAEA solid;
    }

    @page  {
        size: A4;
        margin: 0;
    }

    @media  print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body onload="window.print()">
<div class="book">
    <div class="page">
        <div class="subpage">
            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::disk('public')->url($product->img)); ?>" width="100%"/>
            <h3>Nama : <?php echo e($product->name); ?></h3>
            <h3>Tipe : <?php echo e($product->type == 0 ? 'Flora' : 'Fauna'); ?></h3>
            <h3>Spesies : <?php echo e($product->species); ?></h3>
            <h3>Nama Latin : <?php echo e($product->latin_name); ?></h3>
            <h3>Ciri Khas : <?php echo e($product->characteristic); ?></h3>
            <h3>Habitat : <?php echo e($product->habitat); ?></h3>
            <h3>Bentuk : <?php echo e($product->shape); ?></h3>
            <h3>Total : <?php echo e($product->total); ?></h3>
            <h3>Status : <?php echo e($product->status); ?></h3>
        </div>
    </div>
</div>

</body>
</html>
<?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/flora/print.blade.php ENDPATH**/ ?>