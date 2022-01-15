<template>
    <div class="col-span-3 border-t border-gray-200 sm:grid sm:grid-cols-2 sm:gap-4 justify-center sm:justify-between items-center">
                        <p class="text-center sm:text-left text-xs sm:text-sm font-normal text-gray-500 pt-4 sm:pt-0">shows {{to}} out of {{total}}</p>
                        <nav class="px-4 flex items-center justify-between sm:px-0">
                            <div class="-mt-px w-0 flex-1 flex">
                                <!-- <Link href="#" class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    <ArrowNarrowLeftIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                                    Pre
                                </Link> -->

                                <!--  -->
                                <Link v-for="(link, index) in links" :key="index" :href="link.url" class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    <div class="inline-flex" v-if="link.label.includes('Previous')">

                                    <ArrowNarrowLeftIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" /> Previous</div>

                                    <div class="inline-flex justify-self-end" v-else-if="link.label.includes('Next')">Next <ArrowNarrowRightIcon class="ml-3 h-5 w-5 text-gray-400" aria-hidden="true" /></div>
                                    <div v-else class="hidden md:-mt-px md:flex">
                                        <div  class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300  px-4 inline-flex items-center text-sm font-medium"> {{link.label}} </div>  
                                    </div>
                                </Link>
                                <!--  -->
                            </div>
   
   
                            <!-- <div class="hidden md:-mt-px md:flex">
                                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"> 1 </a>  
                            </div>
                            <div class="-mt-px w-0 flex-1 flex justify-end">
                                <Link href="#" class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    Next
                                    <ArrowNarrowRightIcon class="ml-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                                </Link>
                            </div> -->
                        </nav>
                    </div>
</template>

<script>
import {onBeforeMount, ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import { Link } from '@inertiajs/inertia-vue3'
import {  ArrowNarrowLeftIcon, ArrowNarrowRightIcon} from "@heroicons/vue/outline";


export default {
    components: {
        Link,
        ArrowNarrowLeftIcon,
        ArrowNarrowRightIcon
    },
    props: {
        links:Array,
        to:Object,
        total:Object
    },
    setup(props) {
    },
};
</script>