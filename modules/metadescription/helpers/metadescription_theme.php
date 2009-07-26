<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2009 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class metadescription_theme_Core {
  static function head($theme) {
    // Make sure the current page belongs to an item.
    if (!$theme->item()) {
      return;
    }

    // Create an array of all the tags for the current item.
    $tagsItem = ORM::factory("tag")
      ->join("items_tags", "tags.id", "items_tags.tag_id")
      ->where("items_tags.item_id", $theme->item->id)
      ->find_all();
    
    $metaView = new View("metadescription_block.html");
    $metaView->tags = $tagsItem;
    return $metaView; 
  }

}