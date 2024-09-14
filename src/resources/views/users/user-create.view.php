<?= include_component("user-form", [
    "regions" => $regions,
    "sacraments" => $sacraments,
    "holies" => $holies,
    "responsibilities" => $responsibilities,
    "committees" => $committees,
    "user" => $user ?? [],
    "actionUrl" => path("/users/create"),
    "cancelUrl" => path("/users")
]) ?>

<script src="<?= pubUrl("assets/global.js") ?>"></script>