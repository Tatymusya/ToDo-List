<template>
    <main class="app-main">
        <div class="app-main__container">
            <slot></slot>
        </div>
    </main>
</template>

<style scoped>
    .app-main {
        .app-main__container {
            margin-inline: auto;

            @container (inline-size > 20rem) {
                inline-size: 86dvw;
            }

            @container (inline-size > 48rem) {
                inline-size: 60dvw;
            }

            @container (inline-size > 80rem) {
                inline-size: 40dvw;
            }
        }
    }

</style>
