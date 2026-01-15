<template>
    <AppButton :title="hiddenText" @click="toggleTheme">
        <IconMoon v-if="currentTheme === 'Light'" />
        <IconSun v-if="currentTheme === 'Dark'" />
    </AppButton>
</template>

<script setup>
    import AppButton from '@js/components/ui/AppButton.vue';
    import IconMoon from '@/images/icons/icon-moon.svg?component';
    import IconSun from '@/images/icons/icon-sun.svg?component';
    import { computed, ref } from 'vue';

    let currentTheme = ref('Light');
    const props = defineProps(['hiddenText']);

    const darkThemeStyle = computed(() => {
        const darkThemeStyle = document.head.querySelector('link[rel=stylesheet][media*=prefers-color-scheme][media*=dark]');

        return darkThemeStyle;
    });

    const toggleTheme = () => {
        let darkThemeStyleValue = darkThemeStyle.value;
        if (currentTheme.value === 'Light') {
            currentTheme.value = 'Dark';
            darkThemeStyleValue.media = 'all';
        } else {
            currentTheme.value = 'Light';
            darkThemeStyleValue.media = '(prefers-color-scheme: dark)';
        }
    }

    defineExpose({
        toggleTheme,
        currentTheme
    });
</script>
