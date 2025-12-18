<style>
.barriecito-regular {
    font-family: "Barriecito", system-ui;
    font-weight: 400;
    font-style: normal;
    font-size: 50px;
}
</style>

<template>
    <svg
        :width="width"
        :height="height"
        viewBox="0 0 300 340"
        xmlns="http://www.w3.org/2000/svg"
    >
        <rect width="300" height="340" fill="black"/>

        <g fill="white">
            <rect x="75" y="70" width="70" height="70" rx="12"/>
            <rect x="75" y="160" width="70" height="70" rx="12"/>
            <rect x="160" y="110" width="70" height="70" rx="12"/>
        </g>

        <text x="50%" y="295" fill="white" class="barriecito-regular" text-anchor="middle">
            3G BANK
        </text>
    </svg>
</template>

<script setup>
defineProps({
    width: { type: [String, Number], default: "100%" },
    height: { type: [String, Number], default: "100%" },
});
</script>
