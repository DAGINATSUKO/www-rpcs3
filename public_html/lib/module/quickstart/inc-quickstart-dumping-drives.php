<?php
include_once __DIR__.'/../objects/DriveCatalog.php';

$drives = new DriveCatalog();
$drives->add_drive('LG', 'BE14NU40', DriveType::External);
$drives->add_drive('LG', 'BE16NU50', DriveType::External);
$drives->add_drive('LG', 'BH12LS38', DriveType::Internal);
$drives->add_drive('LG', 'BH14NS40', DriveType::Internal);
$drives->add_drive('LG', 'BH14NS58', DriveType::Internal);
$drives->add_drive('LG', 'BH16NS40', DriveType::Internal);
$drives->add_drive('LG', 'BH16NS48', DriveType::Internal);
$drives->add_drive('LG', 'BH16NS55', DriveType::Internal);
$drives->add_drive('LG', 'BH16NS58', DriveType::Internal);
$drives->add_drive('LG', 'BH16NS60', DriveType::Internal);
$drives->add_drive('LG', 'BH26NS40', DriveType::Internal);
$drives->add_drive('LG', 'BH30N', DriveType::Internal);
$drives->add_drive('LG', 'BH40N', DriveType::Internal);
$drives->add_drive('LG', 'BH50N', DriveType::Internal);
$drives->add_drive('LG', 'BP50NB40', DriveType::External, 'svc code NB50 or NB52');
$drives->add_drive('LG', 'BP55EB40', DriveType::External, 'svc code EB50 or EB52');
$drives->add_drive('LG', 'BP60NB10', DriveType::External, 'svc code NB10 or NB12');
$drives->add_drive('LG', 'BU20N', DriveType::Internal);
$drives->add_drive('LG', 'BU40N', DriveType::Internal);
$drives->add_drive('LG', 'BU50N', DriveType::Internal);
$drives->add_drive('LG', 'CH12NS30', DriveType::Internal);
$drives->add_drive('LG', 'CH12NS38', DriveType::Internal);
$drives->add_drive('LG', 'CH30N', DriveType::Internal);
$drives->add_drive('LG', 'CP50NS20', DriveType::External);
$drives->add_drive('LG', 'UH12NS30', DriveType::Internal);
$drives->add_drive('LG', 'UH12NS40', DriveType::Internal);
$drives->add_drive('LG', 'WH12LS30', DriveType::Internal);
$drives->add_drive('LG', 'WH14NS40', DriveType::Internal);
$drives->add_drive('LG', 'WH16NS40', DriveType::Internal);
$drives->add_drive('LG', 'WH16NS48', DriveType::Internal);
$drives->add_drive('LG', 'WH16NS60', DriveType::Internal);
$drives->add_drive('LG', 'WH24LS30', DriveType::Internal);
$drives->add_drive('LG', 'WH24NS40', DriveType::Internal);
$drives->add_drive('LG', 'WH26NS40', DriveType::Internal);
$drives->add_drive('LG', 'WP50NB40', DriveType::External, 'svc code NB50 or NB52');
$drives->add_drive('Archgon', 'MD-8107-U3', DriveType::External, 'BU40N model only');
$drives->add_drive('ASUS', 'BC-08B1LT', DriveType::Internal);
$drives->add_drive('ASUS', 'BC-12B1ST', DriveType::Internal, 'b revision');
$drives->add_drive('ASUS', 'BC-12D2HT', DriveType::Internal);
$drives->add_drive('ASUS', 'BC-16D1HT', DriveType::Internal);
$drives->add_drive('ASUS', 'BW-14D1XT', DriveType::Internal);
$drives->add_drive('ASUS', 'BW-16D1HT', DriveType::Internal);
$drives->add_drive('ASUS', 'BW-16D1X-U', DriveType::Internal, 'BU50N model only');
$drives->add_drive('ASUS', 'SBW-06D2X-U', DriveType::Internal, 'BU50N model only');
$drives->add_drive('ASUS', 'SBW-06D5H-U', DriveType::Internal, 'BU50N model only');
$drives->add_drive('BenQ', 'BR1000', DriveType::Internal);
$drives->add_drive('Buffalo', 'BN14', DriveType::Internal);
$drives->add_drive('Buffalo', 'BRUHD-PU3-BK', DriveType::Internal);
$drives->add_drive('Buffalo', 'BRXL-PT6U2V', DriveType::Internal);
$drives->add_drive('Buffalo', 'BRXL-PTV6U3', DriveType::Internal);
$drives->add_drive('Samsung', 'SE-406', DriveType::External);
$drives->add_drive('Samsung', 'SE-506', DriveType::External);
$drives->add_drive('Samsung', 'SE-506CB', DriveType::External);
$drives->add_drive('Samsung', 'SH-B083L', DriveType::Internal);
$drives->add_drive('Samsung', 'SH-B123L', DriveType::Internal);
$drives->add_drive('LITE-ON', 'DH-12B2SH', DriveType::Internal);
$drives->add_drive('LITE-ON', 'DH-4O1S', DriveType::Internal);
$drives->add_drive('LITE-ON', 'DH-8B2SH', DriveType::Internal);
$drives->add_drive('LITE-ON', 'DS-4E1S', DriveType::Internal);
$drives->add_drive('LITE-ON', 'DS-6E2SH', DriveType::Internal, '19C revision');
$drives->add_drive('LITE-ON', 'IHBS112', DriveType::Internal, '2 revision');
$drives->add_drive('LITE-ON', 'IHBS212', DriveType::Internal, '2 revision');
$drives->add_drive('LITE-ON', 'IHBS312', DriveType::Internal, '2 revision');
$drives->add_drive('Sony', 'Optiarc BD-5300S', DriveType::Internal);
$drives->add_drive('Sony', 'Optiarc BWU-500S', DriveType::Internal);
$drives->add_drive('Sony', 'PlayStation 3 BDD', DriveType::Internal, 'Adapter or CFW required');
$drives->add_drive('Sony', 'PlayStation 4 BDD', DriveType::Internal, 'CFW required');
$drives->add_drive('Sony', 'PlayStation 5 BDD', DriveType::Internal, 'CFW required');
$drives->add_drive('HP', 'BD335e', DriveType::External);
$drives->add_drive('HP', 'BD335i', DriveType::Internal);
$drives->add_drive('Plextor', 'PX-B950SA', DriveType::Internal);
$drives->add_drive('Plextor', 'PX-B950UE', DriveType::External);
$drives->add_drive('TEAC', 'BD-W512GSA', DriveType::Internal);
$drives->add_drive('Verbatim', 'Verbatim 43888', DriveType::External, 'BU40N model only');
$drives->add_drive('Verbatim', 'Verbatim 43889', DriveType::External, 'BU40N model only');
$drives->add_drive('Verbatim', 'Verbatim 43890', DriveType::External, 'BU40N model only');
?>
<div class="container-con-block darkmode-block">
    <div class="anchor-point" id="dumping_drives">
    </div>
    <div class='container-con-wrapper'>
        <div class="container-tx1-block darkmode-txt">
            <h2>Compatible PC Blu-ray Drives</h2>
        </div>
        <div class="container-tx2-block darkmode-txt">
            <p>
                 Here's a list of known compatible Blu-ray drives that are capable of reading PlayStation discs for use with your computer.
            </p>
        </div>
    </div>
</div>
<?php $drives->print(); ?>