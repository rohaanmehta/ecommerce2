<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<div class='card p-5'>
    <p class='h2'> OUR FINISHES </p>
    <div class='container pt-3'>
        <div class='row'>
            <div class='col-4'>
                <img class='m-1' width='100%' src='<?= base_url('uploads/finishes/Ceramic.jpg');?>'/>
                <p style='font-size:19px;font-weight:600;padding-left:5px;'>Exotic ceramic series</p>
            </div>
            
            <div class='col-4'>
                <img class='m-1' width='100%' src='<?= base_url('uploads/finishes/Exoticceramicseries.jpg');?>'/>
                <p style='font-size:19px;font-weight:600;padding-left:5px;'>The Majestic Ceramic Series</p>
            </div>
            
            <div class='col-4'>
                <img class='m-1' width='100%' src='<?= base_url('uploads/finishes/SolidwoodPU.jpg');?>'/>
                <p style='font-size:19px;font-weight:600;padding-left:5px;'>Solidwood P.U.</p>
            </div>
            
            <div class='col-4'>
                <img class='m-1' width='100%' src='<?= base_url('uploads/finishes/SuperMattseries.jpg');?>'/>
                <p style='font-size:19px;font-weight:600;padding-left:5px;'>The Unique Super Matt Series</p>
            </div>
            
            <div class='col-4'>
                <img class='m-1' width='100%' src='<?= base_url('uploads/finishes/TheCrystalGlass.jpg');?>'/>
                <p style='font-size:19px;font-weight:600;padding-left:5px;'>The Crystal Glass Series</p>
            </div>
            <div class='col-4'>
                <img class='m-1' width='100%' src='<?= base_url('uploads/finishes/Theclassyandcharmingglassseries.jpg');?>'/>
                <p style='font-size:19px;font-weight:600;padding-left:5px;'>The classy and charming glass series</p>
            </div>
            <div class='col-4'>
                <img class='m-1' width='100%' src='<?= base_url('uploads/finishes/TheRichLaminateSeries.jpg');?>'/>
                <p style='font-size:19px;font-weight:600;padding-left:5px;'>The Rich Laminate Series</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>