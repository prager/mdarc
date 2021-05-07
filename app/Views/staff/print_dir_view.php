
<h4>2021 Member Directory</h4>
<p style="font-size: 14px;"><span style="font-weight: bold;"> Name, Call Sign, License Class, Spouse Name, Spouse Call Sign</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; E-Mail<br>
Address, Phone Numbers</p>

<?php foreach($cur_members as $mem) {?>
<p style="font-size: 14px;"><span style="font-weight: bold;">  <?php echo $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign']; ?></span>
<?php echo $mem['email']; ?><br>
<span style="font-style: italic;">
<?php echo $mem['address'] . ' ' . $mem['city'] . ', ' .  $mem['zip']; ?>
</span>
<?php }?>


</body>
</html>
