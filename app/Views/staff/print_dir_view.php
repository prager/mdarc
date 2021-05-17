
<h4>2021 Member Directory</h4>
<p style="font-size: 14px;"><span style="font-weight: bold;"> Name, Call Sign, (License Class), Spouse Name, Spouse Call Sign</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; E-Mail<br>
Address, Phone Numbers</p>

<?php foreach($cur_members as $mem) {?>
<p style="font-size: 14px;"><span style="font-weight: bold;">  <?php
$strshow = '';
if((strlen($mem['spouse_name']) > 0) && (strlen($mem['spouse_call']) > 0)) {
  $strshow = $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign'] . ' (' .
  $mem['license'] . '), ' . $mem['spouse_name'] . ' (' . $mem['spouse_call'] . ')';
}
elseif((strlen($mem['spouse_name']) > 0) && (strlen($mem['spouse_call']) == 0)) {
  $strshow = $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign'] . ' (' .
  $mem['license'] . '), ' . $mem['spouse_name'];
}
elseif(strlen($mem['spouse_name']) == 0) {
  $strshow = $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign'] . ' (' .
  $mem['license'] . ')';
}
$mem['email_unlisted'] == 'False' ? $strshow .= '</span>' . ' ' . strtolower($mem['email']) : $strshow .= '</span>';
echo $strshow; ?><br></span>
<span style="font-style: italic;">
<?php
$strshow =  $mem['address'] . ', ' . $mem['city'] . ', ' . $mem['state'] . ' ' .  $mem['zip'];

if ($mem['w_phone'] != '000-000-0000') {
  $mem['cell_unlisted'] == 'False' ? $strshow .= '; cell: ' . $mem['w_phone'] : $strshow .= '';
}

if ($mem['h_phone'] != '000-000-0000') {
  $mem['phone_unlisted'] == 'False' ? $strshow .= '; phone: ' . $mem['h_phone'] : $strshow .= '';
}

echo $strshow; ?>
</span>
<?php }?>


</body>
</html>
