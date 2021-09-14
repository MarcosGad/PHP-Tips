<?php

    require_once('vendor/autoload.php');

    ob_start();
    ?>
<link href="pdf-style.css" type="text/css" rel="stylesheet">
<page footer="date; page" backtop="20mm" backbottom="20mm" backleft="10mm" backright="10mm">
    <?php
        include 'page_header.php';
        include 'page_footer.php';
    ?>

    <h1>الموضوع: بناء مركب ثقافي</h1>
    <table class="doc-infos">
        <tr>
            <td class="invoice">
                <h3>Invoice N 454545</h3>
                <p>Date : 21/06/2016</p>
            </td>
            <td class="client">
                <h3>SAID HAMRI</h3>
                <p>Beni mellal 4145455</p>
                <p>Tel 4545457575</p>
            </td>
        </tr>
    </table>
    <hr>

    <table class="doc-details" cellspacing="0">
        <tr>
            <th class="ref">Ref</th>
            <th class="desig">Designation</th>
            <th class="qte">QTE</th>
            <th class="price">Price</th>
            <th class="amount">Amount</th>
        </tr>

        <tr>
            <td>4545dfd</td>
            <td>اسمنت يبنمينم سنميي 555 </td>
            <td>1140</td>
            <td>1 450.44</td>
            <td>1 454 555.44</td>
        </tr>
        <tr>
            <td>4545dfd</td>
            <td>اسمنت يبنمينم سنميي 555 </td>
            <td>1140</td>
            <td>1 450.44</td>
            <td>1 454 555.44</td>
        </tr>
        <tr>
            <td>4545dfd</td>
            <td>اسمنت يبنمينم سنميي 555 </td>
            <td>1140</td>
            <td>1 450.44</td>
            <td>1 454 555.44</td>
        </tr>
        <tr>
            <td>4545dfd</td>
            <td>اسمنت يبنمينم سنميي 555 </td>
            <td>1140</td>
            <td>1 450.44</td>
            <td>1 454 555.44</td>
        </tr>

    </table>

    <br>
    <br>

    <table class="total" cellspacing="0">
        <tr>
            <td style="width: 70%">Total HT</td>
            <td style="width: 25%">45 45 455</td>
        </tr>
        <tr>
            <td>Total TVA</td>
            <td>455</td>
        </tr>
        <tr>
            <td>Total TTC</td>
            <td>45 45 455</td>
        </tr>
        <tr>
            <td style="text-align: center" colspan="2">Net A payer : 454 54578</td>
        </tr>
    </table>

    <br>
    <table class="signature-table" cellspacing="0">
        <tr>
            <td class="sinature">Amount chars</td>
            <td class="amount-chars">
                <p>signature client</p>
            </td>
        </tr>
    </table>

 </page>
    <page>
        <?php
        include 'page_header.php';
        include 'page_footer.php';
        ?>
page 2
    </page>
<?php


    $content = ob_get_clean();
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';

// set some language-dependent strings (optional)

    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->pdf->setLanguageArray($lg);

    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('first_PDF_file.pdf');