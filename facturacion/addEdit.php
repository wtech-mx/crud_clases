<?php
//start session
session_start();
include('../estilos.php');
//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//get user data
if (!empty($_GET['id'])) {
    include '../DB.class.php';
    $db = new DB();
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $userData = $db->getRows('facturacion', $conditions);
}

$actionLabel = !empty($_GET['id']) ? 'Edit' : 'Add';

//get status message from session
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<style>
    .form-intern {
        width: 98%;
        height: auto;
        padding: 20px 15px;
        display: block;
        margin: 10px;
        background-color: #d0e5e9;
        border: 1px solid #075D9E;
        display: inline-block;
        overflow: auto;
    }

    sectionCampos.Col2 {
        padding-top: 0px;
        min-height: 50px;
        padding-bottom: 5px;
    }

    .sectionCampos {
        width: 48%;
        float: left;
        min-height: 80px;
        padding: 1%;
    }

    .guardar{
    background-color: #06528b;
    color: #ffff;
}
.field-validation-error {
    color: #e74c3c;
}	
</style>

<section id="cuerpo-container-app">
    <section class="content-header navbar-light">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1> Facturación </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../../">Inicio</a></li>
                        <li class="breadcrumb-item active">Facturación</li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">

            <form method="post" action="userAction.php" class="form">
                <section class="form-intern" style="max-width:1120px; margin-top:0px; display:inline-block;">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">R.F.C.</label>
                        <div class="col-sm-3">
                            <input class="form-control" data-val="true" data-val-regex="R.F.C. con formato inválido debe de estar escrito en Mayusculas (Mínimo 12 caracteres, máximo 13 caracteres)" data-val-regex-pattern="[A-Za-z,Ñ,ñ,&amp;]{3,4}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Za-z,0-9]{2}[0-9A]" data-val-required="El R.F.C. es requerido y debe de estar escrito en Mayusculas (Mínimo 12 caracteres, máximo 13 caracteres)" id="rfc" name="rfc" type="text" value="<?php echo !empty($userData['rfc']) ? $userData['rfc'] : ''; ?>">
                            <span class="field-validation-valid" data-valmsg-for="rfc" data-valmsg-replace="true"></span>
                        </div>

                        <label class="col-sm-2 col-form-label">Nombre o razón social: </label>
                        <div class="col-sm-5">
                            <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Máximo 255 caracteres). Excepto comillas dobles &quot; ; | @ < > " data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´&amp;@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{0,255}$" data-val-required="Alfanumérico (Máximo 255 caracteres)" id="nombre_razon" name="nombre_razon" type="text" value="<?php echo !empty($userData['nombre_razon']) ? $userData['nombre_razon'] : ''; ?>">
                            <span class="field-validation-valid" data-valmsg-for="nombre_razon" data-valmsg-replace="true"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">CURP</label>
                        <div class="col-sm-2">
                            <input class="form-control valid" data-val="true" data-val-regex="El formato del CURP debe de estar escrito en Mayusculas con una longitud de 18 caracteres" data-val-regex-pattern="[A-Z][A,E,I,O,U,X][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][M,H][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,V,W,X,Y,Z]{3}[0-9,A-Z][0-9]" id="curp" name="curp" type="text" value="<?php echo !empty($userData['curp']) ? $userData['curp'] : ''; ?>" aria-describedby="curp" aria-invalid="false">
                            <span class="field-validation-valid" data-valmsg-for="curp" data-valmsg-replace="true"></span>
                        </div>

                        <label class="col-sm-2 col-form-label">Tax Id</label>
                        <div class="col-sm-2">
                            <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 6 caracteres, máximo 40 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{6,40}$" id="tax_id" name="tax_id" type="text" value="<?php echo !empty($userData['tax_id']) ? $userData['tax_id'] : ''; ?>">
                            <span class="field-validation-valid" data-valmsg-for="tax_id" data-valmsg-replace="true"></span>
                        </div>

                        <label class="col-sm-2 col-form-label">No. Licencia</label>
                        <div class="col-sm-2">
                            <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 6 caracteres, máximo 16 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{6,16}$" id="no_licencia" name="no_licencia" type="text" value="<?php echo !empty($userData['no_licencia']) ? $userData['no_licencia'] : ''; ?>">
                            <span class="field-validation-valid" data-valmsg-for="no_licencia" data-valmsg-replace="true"></span>
                            <label class="control-label" style="color: red;">Solo llenar si se usará para generar carta porte</label>
                        </div>
                    </div>

                </section>

                <section class="form-intern" style="max-width:1120px; margin-top:0px; display:inline-block;">
                    <div class="row">

                        <div class="col-6">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="email" name="email" type="email" value="<?php echo !empty($userData['email']) ? $userData['email'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Calle</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 1 caracteres, máximo 60 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{1,60}$" data-val-required="Alfanumérico (Mínimo 1 caracter, máximo 60 caracteres)" id="calle" name="calle" type="text" value="<?php echo !empty($userData['calle']) ? $userData['calle'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="calle" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Número Exterior:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Máximo 60 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < > " data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{0,60}$" id="no_exterior" name="no_exterior" type="text" value="<?php echo !empty($userData['no_exterior']) ? $userData['no_exterior'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="no_exterior" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Número Interior:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Máximo 60 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < > " data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{0,60}$" id="no_interior" name="no_interior" type="number" value="<?php echo !empty($userData['no_interior']) ? $userData['no_interior'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="no_interior" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">País</label>
                                <div class="col-sm-10">
                                    <select class="form-control valid" id="pais" name="pais" aria-invalid="false">
                                        <option value="<?php echo !empty($userData['pais']) ? $userData['pais'] : ''; ?>" selected="">Seleccione el Pais</option>
                                        <option value="AFG">Afganistán</option>
                                        <option value="ALB">Albania</option>
                                        <option value="DEU">Alemania</option>
                                        <option value="AND">Andorra</option>
                                        <option value="AGO">Angola</option>
                                        <option value="AIA">Anguila</option>
                                        <option value="ATA">Antártida</option>
                                        <option value="ATG">Antigua y Barbuda</option>
                                        <option value="SAU">Arabia Saudita</option>
                                        <option value="DZA">Argelia</option>
                                        <option value="ARG">Argentina</option>
                                        <option value="ARM">Armenia</option>
                                        <option value="ABW">Aruba</option>
                                        <option value="AUS">Australia</option>
                                        <option value="AUT">Austria</option>
                                        <option value="AZE">Azerbaiyán</option>
                                        <option value="BHS">Bahamas (las)</option>
                                        <option value="BGD">Bangladés</option>
                                        <option value="BRB">Barbados</option>
                                        <option value="BHR">Baréin</option>
                                        <option value="BEL">Bélgica</option>
                                        <option value="BLZ">Belice</option>
                                        <option value="BEN">Benín</option>
                                        <option value="BMU">Bermudas</option>
                                        <option value="BLR">Bielorrusia</option>
                                        <option value="BOL">Bolivia, Estado Plurinacional de</option>
                                        <option value="BES">Bonaire, San Eustaquio y Saba</option>
                                        <option value="BIH">Bosnia y Herzegovina</option>
                                        <option value="BWA">Botsuana</option>
                                        <option value="BRA">Brasil</option>
                                        <option value="BRN">Brunéi Darussalam</option>
                                        <option value="BGR">Bulgaria</option>
                                        <option value="BFA">Burkina Faso</option>
                                        <option value="BDI">Burundi</option>
                                        <option value="BTN">Bután</option>
                                        <option value="CPV">Cabo Verde</option>
                                        <option value="KHM">Camboya</option>
                                        <option value="CMR">Camerún</option>
                                        <option value="CAN">Canadá</option>
                                        <option value="QAT">Catar</option>
                                        <option value="TCD">Chad</option>
                                        <option value="CHL">Chile</option>
                                        <option value="CHN">China</option>
                                        <option value="CYP">Chipre</option>
                                        <option value="COL">Colombia</option>
                                        <option value="COM">Comoras</option>
                                        <option value="COG">Congo</option>
                                        <option value="COD">Congo (la República Democrática del)</option>
                                        <option value="KOR">Corea (la República de)</option>
                                        <option value="PRK">Corea (la República Democrática Popular de)</option>
                                        <option value="CRI">Costa Rica</option>
                                        <option value="CIV">Côte dIvoire</option>
                                        <option value="HRV">Croacia</option>
                                        <option value="CUB">Cuba</option>
                                        <option value="CUW">Curaçao</option>
                                        <option value="DNK">Dinamarca</option>
                                        <option value="DMA">Dominica</option>
                                        <option value="ECU">Ecuador</option>
                                        <option value="EGY">Egipto</option>
                                        <option value="SLV">El Salvador</option>
                                        <option value="ARE">Emiratos Árabes Unidos (Los)</option>
                                        <option value="ERI">Eritrea</option>
                                        <option value="SVK">Eslovaquia</option>
                                        <option value="SVN">Eslovenia</option>
                                        <option value="ESP">España</option>
                                        <option value="USA">Estados Unidos de America</option>
                                        <option value="EST">Estonia</option>
                                        <option value="ETH">Etiopía</option>
                                        <option value="PHL">Filipinas (las)</option>
                                        <option value="FIN">Finlandia</option>
                                        <option value="FJI">Fiyi</option>
                                        <option value="FRA">Francia</option>
                                        <option value="GAB">Gabón</option>
                                        <option value="GMB">Gambia (La)</option>
                                        <option value="GEO">Georgia</option>
                                        <option value="SGS">Georgia del sur y las islas sandwich del sur</option>
                                        <option value="GHA">Ghana</option>
                                        <option value="GIB">Gibraltar</option>
                                        <option value="GRD">Granada</option>
                                        <option value="GRC">Grecia</option>
                                        <option value="GRL">Groenlandia</option>
                                        <option value="GLP">Guadalupe</option>
                                        <option value="GUM">Guam</option>
                                        <option value="GTM">Guatemala</option>
                                        <option value="GUF">Guayana Francesa</option>
                                        <option value="GGY">Guernsey</option>
                                        <option value="GIN">Guinea</option>
                                        <option value="GNQ">Guinea Ecuatorial</option>
                                        <option value="GNB">Guinea-Bisáu</option>
                                        <option value="GUY">Guyana</option>
                                        <option value="HTI">Haití</option>
                                        <option value="HND">Honduras</option>
                                        <option value="HKG">Hong Kong</option>
                                        <option value="HUN">Hungría</option>
                                        <option value="IND">India</option>
                                        <option value="IDN">Indonesia</option>
                                        <option value="IRQ">Irak</option>
                                        <option value="IRN">Irán (la República Islámica de)</option>
                                        <option value="IRL">Irlanda</option>
                                        <option value="BVT">Isla Bouvet</option>
                                        <option value="IMN">Isla de Man</option>
                                        <option value="CXR">Isla de Navidad</option>
                                        <option value="HMD">Isla Heard e Islas McDonald</option>
                                        <option value="NFK">Isla Norfolk</option>
                                        <option value="ISL">Islandia</option>
                                        <option value="ALA">Islas Åland</option>
                                        <option value="CYM">Islas Caimán (las)</option>
                                        <option value="CCK">Islas Cocos (Keeling)</option>
                                        <option value="COK">Islas Cook (las)</option>
                                        <option value="UMI">Islas de Ultramar Menores de Estados Unidos (las)</option>
                                        <option value="FRO">Islas Feroe (las)</option>
                                        <option value="FLK">Islas Malvinas [Falkland] (las)</option>
                                        <option value="MNP">Islas Marianas del Norte (las)</option>
                                        <option value="MHL">Islas Marshall (las)</option>
                                        <option value="SLB">Islas Salomón (las)</option>
                                        <option value="TCA">Islas Turcas y Caicos (las)</option>
                                        <option value="VGB">Islas Vírgenes (Británicas)</option>
                                        <option value="VIR">Islas Vírgenes (EE.UU.)</option>
                                        <option value="ISR">Israel</option>
                                        <option value="ITA">Italia</option>
                                        <option value="JAM">Jamaica</option>
                                        <option value="JPN">Japón</option>
                                        <option value="JEY">Jersey</option>
                                        <option value="JOR">Jordania</option>
                                        <option value="KAZ">Kazajistán</option>
                                        <option value="KEN">Kenia</option>
                                        <option value="KGZ">Kirguistán</option>
                                        <option value="KIR">Kiribati</option>
                                        <option value="KWT">Kuwait</option>
                                        <option value="LAO">Lao, (la) República Democrática Popular</option>
                                        <option value="LSO">Lesoto</option>
                                        <option value="LVA">Letonia</option>
                                        <option value="LBN">Líbano</option>
                                        <option value="LBR">Liberia</option>
                                        <option value="LBY">Libia</option>
                                        <option value="LIE">Liechtenstein</option>
                                        <option value="LTU">Lituania</option>
                                        <option value="LUX">Luxemburgo</option>
                                        <option value="MAC">Macao</option>
                                        <option value="MKD">Macedonia (la antigua República Yugoslava de)</option>
                                        <option value="MDG">Madagascar</option>
                                        <option value="MYS">Malasia</option>
                                        <option value="MWI">Malaui</option>
                                        <option value="MDV">Maldivas</option>
                                        <option value="MLI">Malí</option>
                                        <option value="MLT">Malta</option>
                                        <option value="MAR">Marruecos</option>
                                        <option value="MTQ">Martinica</option>
                                        <option value="MUS">Mauricio</option>
                                        <option value="MRT">Mauritania</option>
                                        <option value="MYT">Mayotte</option>
                                        <option selected="selected" value="MEX">México</option>
                                        <option value="FSM">Micronesia (los Estados Federados de)</option>
                                        <option value="MDA">Moldavia (la República de)</option>
                                        <option value="MCO">Mónaco</option>
                                        <option value="MNG">Mongolia</option>
                                        <option value="MNE">Montenegro</option>
                                        <option value="MSR">Montserrat</option>
                                        <option value="MOZ">Mozambique</option>
                                        <option value="MMR">Myanmar</option>
                                        <option value="NAM">Namibia</option>
                                        <option value="NRU">Nauru</option>
                                        <option value="NPL">Nepal</option>
                                        <option value="NIC">Nicaragua</option>
                                        <option value="NER">Níger (el)</option>
                                        <option value="NGA">Nigeria</option>
                                        <option value="NIU">Niue</option>
                                        <option value="NOR">Noruega</option>
                                        <option value="NCL">Nueva Caledonia</option>
                                        <option value="NZL">Nueva Zelanda</option>
                                        <option value="OMN">Omán</option>
                                        <option value="NLD">Países Bajos (los)</option>
                                        <option value="ZZZ">Países no declarados</option>
                                        <option value="PAK">Pakistán</option>
                                        <option value="PLW">Palaos</option>
                                        <option value="PSE">Palestina, Estado de</option>
                                        <option value="PAN">Panamá</option>
                                        <option value="PNG">Papúa Nueva Guinea</option>
                                        <option value="PRY">Paraguay</option>
                                        <option value="PER">Perú</option>
                                        <option value="PCN">Pitcairn</option>
                                        <option value="PYF">Polinesia Francesa</option>
                                        <option value="POL">Polonia</option>
                                        <option value="PRT">Portugal</option>
                                        <option value="PRI">Puerto Rico</option>
                                        <option value="GBR">Reino Unido (el)</option>
                                        <option value="CAF">República Centroafricana (la)</option>
                                        <option value="CZE">República Checa (la)</option>
                                        <option value="DOM">República Dominicana (la)</option>
                                        <option value="REU">Reunión</option>
                                        <option value="RWA">Ruanda</option>
                                        <option value="ROU">Rumania</option>
                                        <option value="RUS">Rusia, (la) Federación de</option>
                                        <option value="ESH">Sahara Occidental</option>
                                        <option value="WSM">Samoa</option>
                                        <option value="ASM">Samoa Americana</option>
                                        <option value="BLM">San Bartolomé</option>
                                        <option value="KNA">San Cristóbal y Nieves</option>
                                        <option value="SMR">San Marino</option>
                                        <option value="MAF">San Martín (parte francesa)</option>
                                        <option value="SPM">San Pedro y Miquelón</option>
                                        <option value="VCT">San Vicente y las Granadinas</option>
                                        <option value="SHN">Santa Helena, Ascensión y Tristán de Acuña</option>
                                        <option value="LCA">Santa Lucía</option>
                                        <option value="VAT">Santa Sede[Estado de la Ciudad del Vaticano] (la)</option>
                                        <option value="STP">Santo Tomé y Príncipe</option>
                                        <option value="SEN">Senegal</option>
                                        <option value="SRB">Serbia</option>
                                        <option value="SYC">Seychelles</option>
                                        <option value="SLE">Sierra leona</option>
                                        <option value="SGP">Singapur</option>
                                        <option value="SXM">Sint Maarten (parte holandesa)</option>
                                        <option value="SYR">Siria, (la) República Árabe</option>
                                        <option value="SOM">Somalia</option>
                                        <option value="LKA">Sri Lanka</option>
                                        <option value="SWZ">Suazilandia</option>
                                        <option value="ZAF">Sudáfrica</option>
                                        <option value="SDN">Sudán (el)</option>
                                        <option value="SSD">Sudán del Sur</option>
                                        <option value="SWE">Suecia</option>
                                        <option value="CHE">Suiza</option>
                                        <option value="SUR">Surinam</option>
                                        <option value="SJM">Svalbard y Jan Mayen</option>
                                        <option value="THA">Tailandia</option>
                                        <option value="TWN">Taiwán (Provincia de China)</option>
                                        <option value="TZA">Tanzania, República Unida de</option>
                                        <option value="TJK">Tayikistán</option>
                                        <option value="IOT">Territorio Británico del Océano Índico (el)</option>
                                        <option value="ATF">Territorios Australes Franceses (los)</option>
                                        <option value="TLS">Timor-Leste</option>
                                        <option value="TGO">Togo</option>
                                        <option value="TKL">Tokelau</option>
                                        <option value="TON">Tonga</option>
                                        <option value="TTO">Trinidad y Tobago</option>
                                        <option value="TUN">Túnez</option>
                                        <option value="TKM">Turkmenistán</option>
                                        <option value="TUR">Turquía</option>
                                        <option value="TUV">Tuvalu</option>
                                        <option value="UKR">Ucrania</option>
                                        <option value="UGA">Uganda</option>
                                        <option value="URY">Uruguay</option>
                                        <option value="UZB">Uzbekistán</option>
                                        <option value="VUT">Vanuatu</option>
                                        <option value="VEN">Venezuela, República Bolivariana de</option>
                                        <option value="VNM">Viet Nam</option>
                                        <option value="WLF">Wallis y Futuna</option>
                                        <option value="YEM">Yemen</option>
                                        <option value="DJI">Yibuti</option>
                                        <option value="ZMB">Zambia</option>
                                        <option value="ZWE">Zimbabue</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Código Postal:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 1 caracteres, máximo 10 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{1,10}$" data-val-required="Alfanumérico (Mínimo 1 caracter, máximo 10 caracteres)" id="cp" name="cp" type="number" value="<?php echo !empty($userData['cp']) ? $userData['cp'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="cp" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                        </div>

                        <div class="col-6">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <select class="form-control valid" id="estado" name="estado">
                                        <option value="<?php echo !empty($userData['estado']) ? $userData['estado'] : ''; ?> selected="">Seleccione Estado</option>
                                        <option value=" 1">Aguascalientes</option>
                                        <option value="2">Baja California</option>
                                        <option value="3">Baja California Sur</option>
                                        <option value="4">Campeche</option>
                                        <option value="7">Chiapas</option>
                                        <option value="8">Chihuahua</option>
                                        <option value="9">Ciudad de Mexico</option>
                                        <option value="5">Coahuila</option>
                                        <option value="6">Colima</option>
                                        <option value="10">Durango</option>
                                        <option value="15">Estado de Mexico</option>
                                        <option value="11">Guanajuato</option>
                                        <option value="12">Guerrero</option>
                                        <option value="13">Hidalgo</option>
                                        <option value="34">Indefinido</option>
                                        <option value="14">Jalisco</option>
                                        <option value="16">Michoacan</option>
                                        <option value="17">Morelos</option>
                                        <option value="18">Nayarit</option>
                                        <option value="19">Nuevo Leon</option>
                                        <option value="20">Oaxaca</option>
                                        <option value="21">Puebla</option>
                                        <option value="22">Queretaro</option>
                                        <option value="23">Quintana Roo</option>
                                        <option value="24">San Luis Potosi</option>
                                        <option value="25">Sinaloa</option>
                                        <option value="26">Sonora</option>
                                        <option value="27">Tabasco</option>
                                        <option value="28">Tamaulipas</option>
                                        <option value="29">Tlaxcala</option>
                                        <option selected="" value="30">Veracruz</option>
                                        <option value="31">Yucatan</option>
                                        <option value="32">Zacatecas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Municipio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Máximo 60 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < > " data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{0,60}$" id="municipio" name="municipio" type="text" value="<?php echo !empty($userData['municipio']) ? $userData['municipio'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="municipio" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Localidad</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Máximo 60 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < > " data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{0,60}$" id="localidad" name="localidad" type="text" value="<?php echo !empty($userData['localidad']) ? $userData['localidad'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="localidad" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Colonia:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Máximo 60 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < > " data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{0,60}$" id="colonia" name="colonia" type="text" value="<?php echo !empty($userData['colonia']) ? $userData['colonia'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="colonia" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Referencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Máximo 60 caracteres). Excepto comillas dobles &quot; ; | &amp; @ < > " data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%'/\(\)=\s]{0,60}$" id="referencia" name="referencia" type="text" value="<?php echo !empty($userData['referencia']) ? $userData['referencia'] : ''; ?>">
                                    <span class="field-validation-valid" data-valmsg-for="referencia" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                        </div>

                    </div>

                </section>

                <input type="hidden" name="id" value="<?php echo !empty($userData['id']) ? $userData['id'] : ''; ?>">
                <input type="submit" name="userSubmit" class="btn guardar" value="Guardar" />

            </form>


        </div>

        <?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
            <div class="alert alert-success"><?php echo $statusMsg; ?></div>
        <?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
            <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
        <?php } ?>

    </div>