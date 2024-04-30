<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    currentYear: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <svg id="background" class="absolute -left-20 top-0 max-w-[877px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 877 968">
            <g clip-path="url(#a)">
                <circle cx="391" cy="391" r="390.5" stroke="#FF2D20" transform="matrix(-1 0 0 1 416 -56)"/>
                <circle cx="468" cy="468" r="467.5" stroke="#FF2D20" opacity=".3" transform="matrix(-1 0 0 1 493 -133)"/>
                <circle cx="558" cy="558" r="557.5" stroke="#FF2D20" opacity=".1" transform="matrix(-1 0 0 1 583 -223)"/>
                <g filter="url(#b)">
                    <ellipse cx="583" cy="229.5" fill="#F7D3CD" rx="583" ry="229.5" transform="matrix(-1 0 0 1 621 -9)"/></g>
                <g filter="url(#c)"><ellipse cx="262" cy="184.5" fill="#fff" rx="262" ry="184.5" transform="matrix(-1 0 0 1 99 42)"/>
                </g>
            </g>
            <defs>
                <filter id="b" width="1614" height="907" x="-769" y="-233" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feGaussianBlur result="effect1_foregroundBlur_3089_39042" stdDeviation="112"/>
                </filter>
                <filter id="c" width="972" height="817" x="-649" y="-182" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feGaussianBlur result="effect1_foregroundBlur_3089_39042" stdDeviation="112"/>
                </filter>
                <clipPath id="a">
                    <path fill="#fff" d="M877 0H0v968h877z"/>
                </clipPath>
            </defs>
        </svg>

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">

                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="'/admin/dashboard'"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="'/admin/login'"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="'/admin/register'"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <article>
                    <slot />
                </article>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    {{ currentYear }}
                </footer>

            </div>
        </div>
    </div>
</template>

