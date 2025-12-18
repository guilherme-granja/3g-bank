<template>
    <svg
        :width="width"
        :height="height"
        viewBox="0 0 300 340"
        xmlns="http://www.w3.org/2000/svg"
    >
        <rect width="300" height="340" fill="black"/>

        <g fill="white">
            <rect x="40" y="70" width="70" height="70" rx="12"/>
            <rect x="40" y="160" width="70" height="70" rx="12"/>
            <path d="M150 70 Q220 70 220 140 Q220 210 150 210 Z"/>
        </g>

        <text x="50%" y="295" fill="white"
              font-family="Arial Black, sans-serif"
              font-size="42" text-anchor="middle" letter-spacing="3">
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
