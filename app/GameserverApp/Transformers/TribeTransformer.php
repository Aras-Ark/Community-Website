<?php
namespace GameserverApp\Transformers;

use GameserverApp\Interfaces\ModelTransformerInterface;
use GameserverApp\Models\Tribe;
use GameserverApp\Models\User;

class TribeTransformer extends ModelTransformer implements ModelTransformerInterface
{

    public static function model(array $args)
    {
        return new Tribe($args);
    }

    public static function transformableInput($args)
    {
        $data = [
            'id' => $args->id,
            'name' => $args->name,
            'about' => $args->about,
            'motd' => $args->motd,
            'online' => $args->online
        ];

        if(isset($args->members)) {
            $data['members'] = CharacterTransformer::transformMultiple($args->members);
        }

        if(isset($args->owner_id)) {
            $data['owner_id'] = $args->owner_id;
        }

        if(isset($args->server)) {
            $data['server'] = ServerTransformer::transform($args->server);
        }

        if(isset($args->game)) {
            $data['game'] = GameTransformer::transform($args->game);
        }

        if(isset($args->cluster)) {
            $data['cluster'] = ClusterTransformer::transform($args->cluster);
        }

        return $data;
    }
}