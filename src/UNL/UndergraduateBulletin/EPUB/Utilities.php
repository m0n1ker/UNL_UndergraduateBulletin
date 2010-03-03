<?php
class UNL_UndergraduateBulletin_EPUB_Utilities
{
    public static function convertHeadings($html)
    {
        $html = preg_replace('/<p class="content-box-h-1">([^<]*)<\/p>/', '<h2 class="sec_header content-box-h-1">$1</h2>', $html);
        $html = preg_replace('/<p class="content-box-m-p">([^<]*)<\/p>/', '<h2 class="sec_header content-box-m-p">$1</h2>', $html);
        $html = preg_replace('/<p class="section-1">([^<]*)<\/p>/', '<h3 class="section-1">$1</h3>', $html);
        $html = preg_replace('/<p class="title-1">([^<]*)<\/p>/', '<h3 class="title-1">$1</h3>', $html);
        $html = preg_replace('/<p class="title-2">([^<]*)<\/p>/', '<h4 class="title-2">$1</h4>', $html);
        $html = preg_replace('/<p class="title-3">([^<]*)<\/p>/', '<h5 class="title-3">$1</h5>', $html);
        $html = preg_replace('/<p class="section-2">([^<]*)<\/p>/', '<h4 class="section-2">$1</h4>', $html);
        $html = preg_replace('/<p class="section-3">([^<]*)<\/p>/', '<h5 class="section-3">$1</h5>', $html);
        $html = preg_replace('/([\s]+)?\(([\s]+)?CONTENT BOX HEADING([\s]+)?\)/i', '', $html);
        $html = str_replace('<table>', '<table class="zentable cool">', $html);
        return $html;
    }
    
    public static function addLeaders($html)
    {
        $html = preg_replace('/<br \/>/', ' ', $html);
        $html = preg_replace('/<p class="(requirement-sec-[1-3])">(.*)\s([\d]{1,2})<\/p>/', '<p class="$1"><span class="req_desc">$2</span><span class="leader"></span><span class="req_value">$3</span></p>', $html);
        $html = preg_replace('/<p class="(requirement-sec-[1-3]\-ledr)">(.*)\s([\d]{1,2})<\/p>/', '<p class="$1"><span class="req_desc">$2</span><span class="leader"></span><span class="req_value">$3</span></p>', $html);
        $html = preg_replace('/<p class="(requirement-sec-[1-3]\-note)">(.*)\s([\d]{1,2})<\/p>/', '<p class="$1"><span class="req_desc">$2</span><span class="leader"></span><span class="req_value">$3</span></p>', $html);
        $html = preg_replace('/<p class="(requirement-sec-[1-3])">(.*)\s([\d]{1,2}\-[\d]{1,2})<\/p>/', '<p class="$1"><span class="req_desc">$2</span><span class="leader"></span><span class="req_value">$3</span></p>', $html);
        $html = preg_replace('/<p class="(requirement-sec-[1-3]\-ledr)">(.*)\s([\d]{1,2}\-[\d]{1,2})<\/p>/', '<p class="$1"><span class="req_desc">$2</span><span class="leader"></span><span class="req_value">$3</span></p>', $html);
        $html = preg_replace('/<p class="(requirement-sec-1)">(.*)\s([\d]{2,3})<\/p>/', '<p class="$1"><span class="req_desc">$2</span><span class="leader"></span><span class="req_value">$3</span></p>', $html);
        return $html;
    }
    
    public static function addCourseLinks($text)
    {
        return preg_replace('/([A-Z]{3,4})\s+([0-9]{2,3}[A-Z]?)/', '<a class="course" href="'.UNL_UndergraduateBulletin_Controller::getURL().'courses/$1/$2">$0</a>', $text);
    }
}