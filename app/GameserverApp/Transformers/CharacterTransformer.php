<?php
namespace GameserverApp\Transformers;

use GameserverApp\Interfaces\ModelTransformerInterface;
use GameserverApp\Models\Character;
use GameserverApp\Models\User;

class CharacterTransformer extends ModelTransformer implements ModelTransformerInterface
{

    public static function model(array $args)
    {
        return new Character($args);
    }

    public static function transformableInput($args)
    {
        $data = [
            'id'           => $args->id,
            'name'         => $args->name,
            'level'        => $args->level,
            'gender'       => $args->gender,
            'hours_played' => $args->hours_played,
            'status'       => $args->status,
            'status_since' => $args->status_since,
            'streaming'    => $args->streaming,
            'created_at'   => $args->created_at
        ];

        if (isset($args->server)) {
            $data['server'] = ServerTransformer::transform($args->server);
        }

        if (isset($args->game)) {
            $data['game'] = GameTransformer::transform($args->game);
        }

        if (isset($args->tribe_admin)) {
            $data['tribe_admin'] = $args->tribe_admin;
        }

        if (isset($args->tribe_owner)) {
            $data['tribe_owner'] = $args->tribe_owner;
        }

        if (isset($args->tribe)) {
            $data['tribe'] = TribeTransformer::transform($args->tribe);
        }

        if (isset($args->user)) {
            $data['user'] = UserTransformer::transform($args->user);
        }

        return $data;
    }
}