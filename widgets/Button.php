<?php
/**
 * Created by PhpStorm.
 * User: ARS
 * Date: 10/18/2018
 * Time: 10:23 AM
 */

namespace app\widgets;

use yii\helpers\BaseHtml;
use yii\helpers\Html;

class Button extends BaseHtml
{

    private static function getButtons($type)
    {
        $type = strtolower($type);
        switch ($type) {
            case "login":
                $button = [
                    "title" => "Login",
                    "title_clicked" => "Logging in...",
                    "description" => "Login",
                    "icon" => "",
                    "href" => "",
                    "class" => "btn btn-primary btn-large btn-block",
                    "type" => "submit",
                    "style" => "width: 100%;",
                    "disabled" => false
                ];
                break;
            case "excel":
                $button = [
                    "title" => "Excel",
                    "description" => "Download Excel",
                    "icon" => "fa fa-cloud-download",
                    "href" => "",
                    "class" => "btn btn-info hidden-xs",
                    "disabled" => false
                ];
                break;
            case "reset":
                $button = [
                    "title" => "Reset",
                    "description" => "Reset",
                    "href" => "",
                    "icon" => "fa fa-refresh",
                    "class" => "btn btn-warning",
                    "disabled" => false
                ];
                break;
            case "reload":
                $button = [
                    "title" => "Reload",
                    "description" => "Reload",
                    "href" => "",
                    "icon" => "fa fa-rotate-left",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "add":
                $button = [
                    "title" => "Create",
                    "description" => "Create",
                    "href" => "",
                    "icon" => "fa fa-plus",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "sub":
                $button = [
                    "title" => "Kurang",
                    "description" => "Kurang",
                    "href" => "",
                    "icon" => "fa fa-minus-sign",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "back":
                $button = [
                    "title" => "Back",
                    "description" => "Back",
                    "href" => "",
                    "icon" => "fa fa-arrow-left",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "save":
                $button = [
                    "title" => "Save",
                    "description" => "Save",
                    "href" => "",
                    "icon" => "fa fa-save",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "print":
                $button = [
                    "title" => "Print",
                    "description" => "Print",
                    "href" => "",
                    "icon" => "fa fa-print",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "email":
                $button = [
                    "title" => "Email",
                    "description" => "Email",
                    "href" => "",
                    "icon" => "fa fa-envelope",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "view":
                $button = [
                    "title" => "Lihat",
                    "description" => "Lihat",
                    "href" => "",
                    "icon" => "fa fa-search",
                    "class" => "btn btn-info",
                    "disabled" => false
                ];
                break;
            case "edit":
                $button = [
                    "title" => "Edit",
                    "description" => "Edit",
                    "href" => "",
                    "icon" => "fa fa-edit",
                    "class" => "btn btn-warning",
                    "disabled" => false
                ];
                break;
            case "remove":
                $button = [
                    "title" => "Hapus",
                    "description" => "Hapus",
                    "href" => "",
                    "icon" => "fa fa-trash",
                    "class" => "btn btn-danger",
                    "disabled" => false
                ];
                break;
            case "yes":
                $button = [
                    "title" => "Ya",
                    "description" => "Ya",
                    "href" => "",
                    "icon" => "fa fa-check",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "no":
                $button = [
                    "title" => "Tidak",
                    "description" => "Tidak",
                    "href" => "",
                    "icon" => "fa fa-remove",
                    "class" => "btn btn-danger",
                    "disabled" => false
                ];
                break;
            case "cancel":
                $button = [
                    "title" => "Batal",
                    "description" => "Batal",
                    "href" => "",
                    "icon" => "fa fa-remove",
                    "class" => "btn btn-danger",
                    "disabled" => false
                ];
                break;
            case "verification":
                $button = [
                    "title" => "Verifikasi",
                    "description" => "Verifikasi",
                    "href" => "",
                    "icon" => "fa fa-check-square-o",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "approve":
                $button = [
                    "title" => "Approve",
                    "description" => "Approve",
                    "href" => "",
                    "icon" => "fa fa-check-square-o",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "reject":
                $button = [
                    "title" => "Reject",
                    "description" => "Reject",
                    "href" => "",
                    "icon" => "fa fa-remove",
                    "class" => "btn btn-danger",
                    "disabled" => false
                ];
                break;
            case "search":
                $button = [
                    "title" => "Cari",
                    "description" => "Cari",
                    "href" => "",
                    "icon" => "fa fa-search",
                    "class" => "btn btn-default",
                    "disabled" => false
                ];
                break;
            case "preview":
                $button = [
                    "title" => "Preview",
                    "description" => "Preview",
                    "href" => "",
                    "icon" => "fa fa-file-text-alt",
                    "class" => "btn btn-info",
                    "disabled" => false
                ];
                break;
            case "open":
                $button = [
                    "title" => "Buka",
                    "description" => "Buka",
                    "href" => "",
                    "icon" => "fa fa-folder-open",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "close":
                $button = [
                    "title" => "Tutup",
                    "description" => "Tutup",
                    "href" => "",
                    "icon" => "fa fa-close",
                    "class" => "btn btn-danger",
                    "disabled" => false
                ];
                break;
            case "next":
                $button = [
                    "title" => "Berikutnya",
                    "description" => "Berikutnya",
                    "href" => "",
                    "icon" => "",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "prev":
                $button = [
                    "title" => "Sebelumnya",
                    "description" => "Sebelumnya",
                    "href" => "",
                    "icon" => "",
                    "class" => "btn btn-default",
                    "disabled" => false
                ];
                break;
            case "zoomin":
                $button = [
                    "title" => "Zoom In",
                    "description" => "Zoom In",
                    "href" => "",
                    "icon" => "",
                    "class" => "btn btn-default",
                    "disabled" => false
                ];
                break;
            case "zoomout":
                $button = [
                    "title" => "Zoom Out",
                    "description" => "Zoom Out",
                    "href" => "",
                    "icon" => "",
                    "class" => "btn btn-default",
                    "disabled" => false
                ];
                break;
            case "start":
                $button = [
                    "title" => "Mulai",
                    "description" => "Mulai",
                    "href" => "",
                    "icon" => "",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "finish":
                $button = [
                    "title" => "Selesai",
                    "description" => "Selesai",
                    "href" => "",
                    "icon" => "",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "choose":
                $button = [
                    "title" => "Pilih",
                    "description" => "Pilih",
                    "href" => "",
                    "icon" => "fa fa-check-square-o",
                    "class" => "btn btn-red",
                    "disabled" => false
                ];
                break;
            case "unchoose":
                $button = [
                    "title" => "",
                    "description" => "",
                    "href" => "",
                    "icon" => "fa fa-square-o",
                    "class" => "btn btn-default",
                    "disabled" => false
                ];
                break;
            case "up":
                $button = [
                    "title" => "Naik",
                    "description" => "Naik",
                    "href" => "",
                    "icon" => "fa fa-arrow-up",
                    "class" => "btn btn-default",
                    "disabled" => false
                ];
                break;
            case "down":
                $button = [
                    "title" => "Turun",
                    "description" => "Turun",
                    "href" => "",
                    "icon" => "fa fa-arrow-down",
                    "class" => "btn btn-default",
                    "disabled" => false
                ];
                break;
            case "generate":
                $button = [
                    "title" => "Generate",
                    "description" => "Generate",
                    "href" => "",
                    "icon" => "fa fa-cogs",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "money":
                $button = [
                    "title" => "",
                    "description" => "",
                    "href" => "",
                    "icon" => "fa fa-money",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "barcode":
                $button = [
                    "title" => "Barcode",
                    "description" => "Barcode",
                    "href" => "",
                    "icon" => "fa fa-barcode",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "qrcode":
                $button = [
                    "title" => "QR code",
                    "description" => "QR code",
                    "href" => "",
                    "icon" => "fa fa-qrcode",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "import":
                $button = [
                    "title" => "Import",
                    "description" => "Import",
                    "href" => "",
                    "icon" => "fa fa-upload",
                    "class" => "btn btn-info",
                    "disabled" => false
                ];
                break;
            case "export":
                $button = [
                    "title" => "Export",
                    "description" => "Export",
                    "href" => "",
                    "icon" => "fa fa-download",
                    "class" => "btn btn-info",
                    "disabled" => false
                ];
                break;
            case "upload":
                $button = [
                    "title" => "Upload",
                    "description" => "Upload",
                    "href" => "",
                    "icon" => "fa fa-upload",
                    "class" => "btn btn-info",
                    "disabled" => false
                ];
                break;
            case "download":
                $button = [
                    "title" => "Download",
                    "description" => "Download",
                    "href" => "",
                    "icon" => "fa fa-download",
                    "class" => "btn btn-info",
                    "disabled" => false
                ];
                break;
            case "finalize":
                $button = [
                    "title" => "Finalisasi",
                    "description" => "Finalisasi",
                    "href" => "",
                    "icon" => "fa fa-ok",
                    "class" => "btn btn-success",
                    "disabled" => false
                ];
                break;
            case "password":
                $button = [
                    "title" => "Password",
                    "description" => "Password",
                    "href" => "",
                    "icon" => "fa fa-key",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "map":
                $button = [
                    "title" => "Peta",
                    "description" => "Peta",
                    "href" => "",
                    "icon" => "fa fa-map-marker",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            case "history":
                $button = [
                    "title" => "History",
                    "description" => "History",
                    "href" => "",
                    "icon" => "fa fa-history",
                    "class" => "btn btn-primary",
                    "disabled" => false
                ];
                break;
            default :
                $button = [
                    "title" => "",
                    "description" => "",
                    "href" => "",
                    "icon" => "",
                    "style" => "",
                    "disabled" => false
                ];
                break;
        }
        return $button;
    }

    public static function create($type, $url = null, $class = null, $icon = null, $title = null)
    {
        $button = static::getButtons($type);
        $class = $class ? $class : $button['class'];
        $icon = $icon ? $icon : $button['icon'];
        $title = $title ? $title : $button['title'];

        return Html::a('<i class="' . $icon . '"></i> ' . $title, [$url], ['class' => $class]);
    }

    public static function submit($type, $class = null, $icon = null, $title = null)
    {
        $button = static::getButtons($type);
        $class = $class ? $class : $button['class'];
        $icon = $icon ? $icon : $button['icon'];
        $title = $title ? $title : $button['title'];

        return Html::submitButton('<i class="' . $icon . '"></i> ' . $title, ['class' => $class]);
    }

}