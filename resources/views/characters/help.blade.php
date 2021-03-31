@extends('layouts.app')

@section('title', config('app.name'). " | ".__('characters.title'))

@section('content')
    <div class="container text-center spacing">
        <h1 class="display-4 text-center">{{__('characters.title')}}</h1>
        <div class="btn-group margin-medium" role="group">
            <button class="btn btn-outline-primary " type="button" onclick="window.location='{{route('createCharacter')}}'">{{__('characters.create')}}</button>
            <button class="btn btn-outline-primary" type="button" onclick="window.location='{{route('listCharacter')}}'">{{__('characters.list')}}</button>
            <button class="btn btn-outline-primary active" type="button" onclick="window.location='{{route('helpCharacter')}}'">{{__('characters.help')}}</button>
        </div>
    </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small subtitle-small">{{__('characters.identity')}}</h2>
                <h4 class="text-left subtitle-small">{{__('characters.field.name')}}</h4>
                <p>{{__('characters.character.name.desc')}}</p>
                <h4>{{__('characters.field.race')}}</h4>
                <p>{{__('characters.character.race.desc')}}</p>
                <h4>{{__('characters.field.class')}}</h4>
                <p>{{__('characters.character.class.desc')}}</p>
                <h4>{{__('characters.field.level')}}</h4>
                <p>{{__('characters.character.level.desc')}}</p>
                <h4>{{__('characters.field.birthday.date')}}</h4>
                <p>{{__('characters.character.DOB.desc')}}</p>
                <h4>{{__('characters.field.birthday.localisation')}}</h4>
                <p>{{__('characters.character.POB.desc')}}</p>
                <h4>{{__('characters.field.localisation')}}</h4>
                <p>{{__('characters.character.location.desc')}}</p>
                <h4>{{__('characters.field.belief')}}</h4>
                <p>{{__('characters.character.religion.desc')}}</p>
                <h4>{{__('characters.field.gender')}}</h4>
                <p>{{__('characters.character.gender.desc')}}</p>
                <h4>{{__('characters.field.weight')}}</h4>
                <p>{{__('characters.character.weight.desc')}}</p>
                <h4>{{__('characters.field.height')}}</h4>
                <p>{{__('characters.character.height.desc')}}</p>
                <h4>{{__('characters.field.iriscolor')}}</h4>
                <p>{{__('characters.character.eye_color.desc')}}</p>
                <h4>{{__('characters.field.haircolor')}}</h4>
                <p>{{__('characters.character.hair_color.desc')}}</p>
                <h4>{{__('characters.field.skincolor')}}</h4>
                <p>{{__('characters.character.skin_color.desc')}}</p>
                <h4>{{__('characters.descplaceholder')}}</h4>
                <p>{{__('characters.character.desc')}}</p>
        </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small subtitle-small">{{__('characters.stats')}}</h2>
                <h4 class="text-uppercase">{{__('characters.contraction.strength')}}</h4>
                <p>{{__('characters.stat.STR.desc')}}</p>
                <h4 class="text-uppercase">{{__('characters.contraction.dexterity')}}</h4>
                <p>{{__('characters.stat.DEX.desc')}}</p>
                <h4 class="text-uppercase">{{__('characters.contraction.constitution')}}</h4>
                <p>{{__('characters.stat.CON.desc')}}</p>
                <h4 class="text-uppercase">{{__('characters.contraction.intelligence')}}</h4>
                <p>{{__('characters.stat.INT.desc')}}</p>
                <h4 class="text-uppercase">{{__('characters.contraction.wisdom')}}</h4>
                <p>{{__('characters.stat.WIS.desc')}}</p>
                <h4 class="text-uppercase">{{__('characters.contraction.charisma')}}</h4>
                <p>{{__('characters.stat.CHA.desc')}}</p>
        </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small subtitle-small">{{__('characters.other')}}</h2>
            <h4>{{__('characters.hp.max')}}</h4>
            <p>{{__('characters.other.max_HP.desc')}}</p>
            <h4>{{__('characters.hp.current')}}</h4>
            <p>{{__('characters.other.current_HP.desc')}}</p>
            <h4>{{__('characters.speed')}}</h4>
            <p>{{__('characters.other.speed.desc')}}</p>
            <h4>{{__('characters.resistance')}}</h4>
            <p>{{__('characters.other.resistance.desc')}}</p>
            <h4 >{{__('characters.sight')}}</h4>
            <p>{{__('characters.other.vision.desc')}}</p>
            <h4 >{{__('characters.common.note')}}</h4>
            <p>{{__('characters.other.note')}}</p>
        </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small subtitle-small">{{__('characters.combat')}}</h2>
            <h3 class="text-left subtitle-small subtitle-small">{{__('characters.attack')}}</h3>
            <h4>{{__('characters.attack.type.melee')}}</h4>
            <p>{{__('characters.fighting.attack.melee.desc')}}</p>
            <h4>{{__('characters.attack.type.ranged')}}</h4>
            <p>{{__('characters.fighting.attack.distance.desc')}}</p>
            <h4>{{__('characters.attack.type.spells')}}</h4>
            <p>{{__('characters.fighting.attack.magic.desc')}}</p>
            <h4>{{__('characters.common.note')}}</h4>
            <p>{{__('characters.fighting.attack.note')}}</p>
            <h3 class="text-left subtitle-small subtitle-small">{{__('characters.defense')}}</h3>
            <h4>{{__('characters.attack.type.melee')}}</h4>
            <p>{{__('characters.fighting.defense.melee.desc')}}</p>
            <h4>{{__('characters.attack.type.ranged')}}</h4>
            <p>{{__('characters.fighting.defense.distance.desc')}}</p>
            <h4>{{__('characters.attack.type.spells')}}</h4>
            <p>{{__('characters.fighting.defense.magic.desc')}}</p>
            <h4>{{__('characters.common.note')}}</h4>
            <p>{{__('characters.fighting.defense.note')}}</p>
        </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small subtitle-small">{{__('characters.abilities')}}</h2>
            <h4>{{__('characters.ability.name')}}</h4>
            <p>{{__('characters.ability.name.desc')}}</p>
            <h4>{{__('characters.ability.caracteristic')}}</h4>
            <p>{{__('characters.ability.characteristic.desc')}}</p>
            <h4>{{__('characters.common.desc')}}</h4>
            <p>{{__('characters.ability.desc')}}</p>
        </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small subtitle-small">{{__('characters.weapons')}}</h2>
            <h4>{{__('characters.weapon.name')}}</h4>
            <p>{{__('characters.weapon.name.desc')}}</p>
            <h4>{{__('characters.weapon.range')}}</h4>
            <p>{{__('characters.weapon.range.desc')}}</p>
            <h4>{{__('characters.weapon.damage')}}</h4>
            <p>{{__('characters.weapon.damage.desc')}}</p>
            <h4>{{__('characters.weapon.weight')}}</h4>
            <p>{{__('characters.weapon.weight.desc')}}</p>
            <h4>{{__('characters.common.desc')}}</h4>
            <p>{{__('characters.weapon.desc')}}</p>
        </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small subtitle-small">{{__('characters.armors')}}</h2>
            <h4>{{__('characters.armor.name')}}</h4>
            <p>{{__('characters.armor.name.desc')}}</p>
            <h4>{{__('characters.armor.protection')}}</h4>
            <p>{{__('characters.armor.protection.desc')}}</p>
            <h4>{{__('characters.armor.weight')}}</h4>
            <p>{{__('characters.armor.weight.desc')}}</p>
            <h4>{{__('characters.common.desc')}}</h4>
            <p>{{__('characters.armor.desc')}}</p>
        </div>
        <div class="container subtitle-medium">
            <h2 class="text-left subtitle-small">{{__('characters.items')}}</h2>
            <h4>{{__('characters.item.name')}}</h4>
            <p>{{__('characters.item.name.desc')}}</p>
            <h4>{{__('characters.item.weight')}}</h4>
            <p>{{__('characters.item.weight.desc')}}</p>
            <h4>{{__('characters.common.desc')}}</h4>
            <p>{{__('characters.item.desc')}}</p>
        </div>
@stop
