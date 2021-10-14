<?php

//kumpulan shortcode untuk mempermudah pemanggilan di backend dan frontend

use App\Models\CmsModel;

if (!function_exists('quote')) {
	function quote($text)
	{
		$db      = \Config\Database::connect();
		return $db->escape($text);
	}
}

if (!function_exists('quoteLike')) {
	function quoteLike($text)
	{
		$db      = \Config\Database::connect();
		return $db->escape("%" . $text . "%");
	}
}

if (!function_exists('query')) {
	function query($sql)
	{
		$db      = \Config\Database::connect();
		return $db->query($sql);
	}
}

if (!function_exists('get_setting')) {
	function get_setting($param, $return = "content")
	{
		$sql = query("SELECT * FROM cms_option WHERE param = " . quote($param));

		$row = $sql->getRowArray();
		if (strlen($row[$return]) == 0) {
			return $row['def'];
		} else
			return $row[$return];
	}
}

if (!function_exists('is_same')) {
	function is_same($a, $b, $out = "")
	{
		if ($a == $b)
			return $out;
	}
}

if (!function_exists('is_note_same')) {
	function is_not_same($a, $b, $out = "")
	{
		if ($a <> $b)
			return $out;
	}
}

if (!function_exists('dump')) {
	function dump($arr, $type = "print_r")
	{
		echo "<textarea style='width:100%; height:300px;'>";
		if ($type == "print_r")
			print_r($arr);
		else
			var_dump($arr);
		echo "</textarea>";
	}
}

if (!function_exists('register_header')) {
	function register_header($script, $loc = "")
	{
		global $register_header;
		$register_header .= $script . "\n";
	}
}

if (!function_exists('register_footer')) {
	function register_footer($script, $loc = "")
	{
		global $register_footer;
		$register_footer .= $script . "\n";
	}
}

if (!function_exists('cms_register')) {
	function cms_register($loc)
	{
		global $register_header;
		global $register_footer;

		if ($loc == "header") {
			echo $register_header;
		} else if ($loc == "footer") {
			echo $register_footer;
		}
	}
}

if (!function_exists('shortcode_login')) {
	function shortcode_login($priv = 0, $header = "")
	{
		$cms = new CmsModel();
		$log = $cms->cek_login();
		if ($log) {
			//pengaturan priviledge
			#0 : Semua priviledge boleh masuk
			if ($priv == 0)
				return $log;
			else {
				#priviledge yang lebih besar dari yg seharusnya dianggap tidak memiliki akses
				if ($log['priviledge'] > $priv) {
					create_alert("Access Denied", "Anda tidak memiliki hak untuk mengakses halaman tersebut", $header);
					exit();
				} else {
					return $log;
				}
			}
		} else {
			create_alert("Access Denied", "Silakan log in terlebih dahulu sebelum mengakses halaman Admin", "");
			exit();
		}
	}
}

if (!function_exists('cut_text')) {
	function cut_text($txt, $length = 20)
	{
		$x = explode(" ", $txt);
		if (count($x) <= $length)
			return $txt;
		else {
			$imp = "";
			for ($i = 0; $i < $length; $i++) {
				$imp .= $x[$i] . " ";
			}
			return $imp;
		}
	}
}

if (!function_exists('post_session')) {
	function post_session($post, $list = array())
	{
		foreach ($list as $l) {
			if (isset($post[$l])) {
				$_SESSION['form-' . $l] = $post[$l];
			}
		}
	}
}


if (!function_exists('input')) {
	function input($type, $name, $default = "", $class = "", $attr = "", $list = array())
	{
		//pengaturan default value di input
		if (isset($_SESSION['form-' . $name])) {
			$default = $_SESSION['form-' . $name];
			unset($_SESSION['form-' . $name]);
		}

		$ret = "";
		if ($type == "select") {
			$ret .= "<select name='$name' id='form-$name' class='$class' $attr>";
			$ret .= "<option></option>";

			foreach ($list as $key => $val) {
				$sel = "";
				if ($key == $default) {
					$sel = "selected";
				}
				$ret .= "<option $sel value='$key'>$val</option>";
			}

			$ret  .= "</select>";
		} else if ($type == "radio") {
			$tk = 0;
			foreach ($list as $key => $val) {
				$sel = "";
				if ($key == $default) {
					$sel = "checked";
				}
				$ret .= "<label for='form-$name-$tk'><input type='radio' name='$name' id='form-$name-$tk' value='$key' $sel> $val</label> ";
				$tk++;
			}
		} else if ($type == "textarea") {
			$ret .= "<textarea name='$name' id='form-$name' class='$class' $attr>$default</textarea>";
		} else if ($type == "file") {
			$ret .= "<input type='file' name='$name' class='$class' $attr value='$default'>";
		} else {
			$ret .= "<input type='$type' name='$name' class='$class' id='form-$name' $attr value='$default'>";
		}

		return $ret;
	}
}

if (!function_exists('paging')) {
	function paging($sql, $currentpage = 1)
	{
		$run = query($sql);
		$num = $run->getFieldCount();

		$limit = get_setting("backend_paging");
		$offset = ($currentpage - 1) * $limit;

		$totalpage = ceil($num / $limit);

		$addQuery = "LIMIT $offset,$limit";

		return array(
			"totalpage" => $totalpage,
			"query" => $sql . " " . $addQuery
		);
	}
}

if (!function_exists('get_month')) {
	function get_month($n = null)
	{

		$month = array(
			"", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
		);
		if ($n === null) {
			return $month;
		} else
			return $month[$n];
	}
}

if (!function_exists('indo_date')) {
	function indo_date($tgl, $type = "half")
	{
		$month = array(
			"", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
		);

		$tahun = date("Y", strtotime($tgl));
		$bulan = $month[date("n", strtotime($tgl))];
		$tanggal = date("d", strtotime($tgl));

		$fullDate = "$tanggal $bulan $tahun";

		if ($type <> "half") {
			$jam = date("H:i:s", strtotime($tgl));
			return $fullDate . " " . $jam;
		}
		return $fullDate;
	}
}

if (!function_exists('check_image')) {
	function check_image($dir, $default = "upload/default.jpg")
	{
		if (is_file($dir)) {
			$image = "<img src='$dir' height=50>";
		} else {
			$image = "<img src='$default' height=50>";
		}
		return $image;
	}
}

if (!function_exists('pagination')) {
	function pagination($totalpage, $currentpage = 1)
	{
		$url = $_SERVER['REQUEST_URI'];
		$exp = explode("?", $url);


		echo "<ul class='pagination'>";
		for ($i = 1; $i <= $totalpage; $i++) {
			$cl = "";
			if ($i == $currentpage) {
				$cl = "active";
			}
			echo "<li class='$cl'><a href='$exp[0]?page=$i'>$i</a></li>";
		}
		echo "</ul>";
	}
}

if (!function_exists('create_alert')) {
	function create_alert($type, $pesan, $header = null)
	{
		//shortcode aja
		session()->set('adm-type', $type);
		session()->set('adm-message', $pesan);

		if ($header !== null) {
			header("Location:". base_url($header));
			exit();
		}
	}
}

if (!function_exists('rupiah')) {
	function rupiah($num, $angka_belakang_koma = 0)
	{
		$angka = number_format($num, $angka_belakang_koma, ",", ".");
		return "Rp " . $angka;
	}
}

if (!function_exists('jumlah_hari')) {
	function jumlah_hari($bulan, $tahun)
	{
		$def = array(
			1 => 31,
			2 => 0,
			3 => 31,
			4 => 30,
			5 => 31,
			6 => 30,
			7 => 31,
			8 => 31,
			9 => 30,
			10 => 31,
			11 => 30,
			12 => 31
		);
		$current = $def[intval($bulan)];
		if ($current == 0) {
			if ($tahun % 4 == 0)
				$current = 29;
			else
				$current = 28;
		}

		return $current;
	}
}

if (!function_exists('better_time')) {
	function better_time($int)
	{
		if ($int == 0)
			return null;

		if (($int / 3600) > 1) {
			$jam = floor($int / 3600);
			$int -= ($jam * 3600);
		}

		if (($int / 60) > 1) {
			$menit = floor($int / 60);
			$int -= ($menit * 60);
		}

		$detik = $int;

		$out = "";
		if (isset($jam))
			$out .= "$jam jam ";
		if (isset($menit))
			$out .= "$menit menit ";
		if ($detik > 0)
			$out .= "$detik detik ";

		$ret = "<span class='label label-danger'>$out</span>";

		return $ret;
	}
}

if (!function_exists('selisih_tgl')) {
	function selisih_tgl($tgl_a, $tgl_b)
	{
		$a = date_create($tgl_a);
		$b = date_create($tgl_b);

		$selisih = date_diff($a, $b);
		$hari = $selisih->format("%a");

		if (($hari / 365) >= 1) {
			$tahun = floor($hari / 365);
			$hari -= ($tahun * 365);
		}
		if (($hari / 30) >= 1) {
			$bulan = floor($hari / 30);
			$hari -= ($bulan * 30);
		}

		$out = "";
		if (isset($tahun))
			$out .= "$tahun tahun ";
		if (isset($bulan))
			$out .= "$bulan bulan ";
		if ($hari > 0)
			$out .= "$hari hari";

		return $out;
	}
}