<?php namespace Gazsp\EloquentCockpit;

use Jenssegers\Mongodb\Model as Eloquent;

class CockpitCollection extends Eloquent {

    function __construct() {
        // Try to find Cockpit Collections
        $result = \DB::collection('common_collections')->get();
        if(!$result) {
            throw new \Exception("Unable to find Cockpit 'common_collections' collection. Is Cockpit installed correctly?");
        }

        // Try to find this collection via it's slug
        $found = array_filter($result, function($collection) {
            if($collection['slug'] == $this->cockpitSlug) {
                $this->collection = "collections_collection{$collection['_id']}";
                $this->cockpitCollection = $collection;

                return $collection;
            };
        });

        if(!$found) {
            throw new \Exception("Unable to find Cockpit collection with slug '{$this->cockpitSlug}'");
        }

        // Off we go...
        parent::__construct();
    }

}
