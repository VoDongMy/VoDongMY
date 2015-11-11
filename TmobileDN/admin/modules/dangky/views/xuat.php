<?php 

header("Content-type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=danh-sach-dang-ky-email.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml"xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REChtml40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>

tr {
}
col {
}
br {
}
.style0 {
    border: medium none;
    color: black;
    font-family: Calibri,sans-serif;
    font-size: 11pt;
    font-style: normal;
    font-weight: 400;
    text-decoration: none;
    vertical-align: bottom;
    white-space: nowrap;
}
td {
    border: medium none;
    color: black;
    font-family: Calibri,sans-serif;
    font-size: 11pt;
    font-style: normal;
    font-weight: 400;
    padding-left: 1px;
    padding-right: 1px;
    padding-top: 1px;
    text-decoration: none;
    vertical-align: bottom;
    white-space: nowrap;
}
.xl65 {
    border: 0.5pt solid windowtext;
    font-family: Arial,sans-serif;
    font-size: 10pt;
    text-align: center;
    vertical-align: middle;
}
.xl66 {
    border: 0.5pt solid windowtext;
    font-family: Arial,sans-serif;
    font-size: 10pt;
    vertical-align: middle;
}
.xl67 {
    border-color: -moz-use-text-color -moz-use-text-color windowtext;
    border-style: none none solid;
    border-width: medium medium 0.5pt;
    font-family: Arial,sans-serif;
    font-size: 12pt;
    font-weight: 700;
    text-align: center;
    vertical-align: middle;
}
.xl68 {
    border: 0.5pt solid windowtext;
    font-family: Arial,sans-serif;
    font-size: 10pt;
    text-align: left;
    vertical-align: middle;
}
.xl69 {
    border: 0.5pt solid windowtext;
    font-family: Arial,sans-serif;
    font-size: 10pt;
    font-weight: 700;
    text-align: center;
    vertical-align: middle;
}

</style>
</head>
<body vlink="purple" link="blue" class="xl65">
<table style="border-collapse: collapse;table-layout:fixed;width:1015pt" border="0" cellpadding="0" cellspacing="0" width="1354">
<colgroup>
    <col style="mso-width-source:userset;mso-width-alt:1243;width:26pt" width="34">
    <col style="mso-width-source:userset;mso-width-alt:2742;width:56pt" width="75">
    <col style="mso-width-source:userset;mso-width-alt:4644;width:95pt" width="127">
    <col style="mso-width-source:userset;mso-width-alt:4681;width:96pt" width="128">
    <col style="mso-width-source:userset;mso-width-alt:7021;width:144pt" width="192">
    <col style="mso-width-source:userset;mso-width-alt:11666;width:239pt" width="319">
    <col style="mso-width-source:userset;mso-width-alt:9362;width:192pt" width="256">
    <col style="mso-width-source:userset;mso-width-alt:4681;width:96pt" width="128">
    <col style="mso-width-source:userset;mso-width-alt:3474;width:71pt" width="95">
</colgroup>
<tbody>
<tr style="mso-height-source:userset;height:33.0pt" height="44">
    <td colspan="9" class="xl67" style="height:33.0pt; width:1015pt" height="44" width="1354">DANH SÁCH ĐĂNG KÝ EMAIL</td>
</tr>
<tr style="mso-height-source:userset;height:17.1pt" height="22">
    <td class="xl69" style="height:17.1pt;border-top:none" height="22">STT</td>
    <td class="xl69" style="border-top:none;border-left:none">Họ<span style="mso-spacerun:yes">&nbsp;</span></td>
    <td class="xl69" style="border-top:none;border-left:none">Tên</td>
    <td class="xl69" style="border-top:none;border-left:none">Điện thoại</td>
    <td class="xl69" style="border-top:none;border-left:none">Email</td>
    <td class="xl69" style="border-top:none;border-left:none">Địa chỉ 1</td>
    <td class="xl69" style="border-top:none;border-left:none">Địa chỉ 2</td>
    <td class="xl69" style="border-top:none;border-left:none">Thành phố</td>
    <td class="xl69" style="border-top:none;border-left:none">Quốc gia</td>
</tr>
<?
$i = 1;
foreach($list as $rs):?>
<tr style="mso-height-source:userset;height:17.1pt" height="22">
    <td class="xl65" style="height:17.1pt;border-top:none" height="22"><?=$i?></td>
    <td class="xl66" style="border-top:none;border-left:none"><?=$rs->ho?></td>
    <td class="xl66" style="border-top:none;border-left:none"><?=$rs->ten?></td>
    <td class="xl68" style="border-top:none;border-left:none"><?=$rs->mobile?></td>
    <td class="xl66" style="border-top:none;border-left:none"><?=$rs->email?></td>
    <td class="xl66" style="border-top:none;border-left:none"><?=$rs->address1?>;</td>
    <td class="xl66" style="border-top:none;border-left:none"><?=$rs->address2?></td>
    <td class="xl66" style="border-top:none;border-left:none"><?=$rs->city?></td>
    <td class="xl66" style="border-top:none;border-left:none"><?=$rs->country?></td>
</tr>
<?
$i++;
endforeach;?>

<!--[if supportMisalignedColumns]-->
<tr style="display:none" height="0">
    <td style="width:26pt" width="34"></td>
    <td style="width:56pt" width="75"></td>
    <td style="width:95pt" width="127"></td>
    <td style="width:96pt" width="128"></td>
    <td style="width:144pt" width="192"></td>
    <td style="width:239pt" width="319"></td>
    <td style="width:192pt" width="256"></td>
    <td style="width:96pt" width="128"></td>
    <td style="width:71pt" width="95"></td>
</tr>
<!--[endif]-->
</tbody>
</table>
</body>
</html>
