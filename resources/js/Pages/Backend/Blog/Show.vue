<template>
	<svelte:head>
		<title>Blog Details - NameSpace IT</title>
		<meta head-key="description" name="description" content="This is a page specific description" />
	</svelte:head>
	<app-layout>
		<section class="px-0 py-10 bg-gray-100">
			<div class="max-w-5xl mx-auto">
				<h1 class="text-center text-xl font-bold text-gray-700"></h1>
				<!-- Breadcrumb Start -->
				<div class="pl-8 pb-4">
					<nav class="flex" aria-label="Breadcrumb">
						<ol role="list" class="bg-white rounded-md shadow px-6 flex space-x-4">
							<li class="flex">
								<div class="flex items-center">
									<a href="#" class="text-gray-400 hover:text-gray-500">
										<HomeIcon class="flex-shrink-0 h-5 w-5" aria-hidden="true" />
										<span class="sr-only">Home</span>
									</a>
								</div>
							</li>
							<li v-for="page in pages" :key="page.name" class="flex">
								<div class="flex items-center">
									<svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
										<path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
									</svg>
									<a :href="page.href" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" :aria-current="page.current ? 'page' : undefined">{{ page.name }}</a>
								</div>
							</li>
						</ol>
					</nav>
				</div>
				<!-- Breadcrumb End -->
				<div class="bg-white shadow px-4 pb-10 sm:rounded-lg sm:p-6">
					<div class="md:grid md:grid-cols-3 md:gap-6 py-8">
						<div class="md:col-span-1">
							<h3 class="text-2xl font-black leading-6 text-gray-900">{{ blog.title }}'s Information</h3>
							<p class="mt-2 text-sm text-indigo-500">Details of {{ blog.title }}'s blog</p>
						</div>
						<div class="mt-5 md:mt-0 md:col-span-2">
							<div class="bg-gray-100 shadow overflow-hidden sm:rounded-lg">
								<div class="border-t border-gray-200 px-4 py-5 sm:p-0">
									<dl class="sm:divide-y sm:divide-gray-200">
										<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
											<dt class="text-sm font-medium text-gray-500">TITLE</dt>
											<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
												{{ blog.title }}
											</dd>
										</div>

										<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
											<dt class="text-sm font-medium text-gray-500">DESCRIPTION</dt>
											<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
												{{ blog.body }}
											</dd>
										</div>

										<div v-if="blog.status == '1'" class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
											<dt class="text-sm font-medium text-gray-500">STATUS</dt>
											<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
												<span class="bg-amber-500 p-2 rounded-full text-white">Active</span>
											</dd>
										</div>

										<div v-else class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
											<dt class="text-sm font-medium text-gray-500">STATUS</dt>
											<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
												<span class="bg-yellow-800 p-2 rounded-full text-white">Inactive </span>
											</dd>
										</div>

										<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
											<dt class="text-sm font-medium text-gray-500">BLOG CREATED AT:</dt>
											<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
												{{ blog.created_at }}
											</dd>
										</div>

										<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
											<dt class="text-sm font-medium text-gray-500">THUMBNAIL IMAGE</dt>
											<img :src="blog.thumbnail" alt="thumbnail image" class="h-40 w-40" />
										</div>
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--model end-->
			</div>
		</section>
	</app-layout>
</template>

<script>
import AppLayout from "../../../Layouts/Backend/AppLayout.vue"
import {Inertia} from "@inertiajs/inertia"
import {ref, onMounted, onBeforeMount} from "vue"
import {HomeIcon} from "@heroicons/vue/solid"

const pages = [{name: "All Blogs", href: "/app/blogs", current: true}]

export default {
	components: {
		AppLayout,
		HomeIcon,
	},

	props: {
		blog: Object,
	},
	setup() {
		return {
			pages,
		}
	},
}
</script>
