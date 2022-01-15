<template>
	<div class="bg-white">
		<div class="relative overflow-hidden">
			<Popover as="header" class="relative">
				<div class="bg-gray-900 p-6">
					<nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
						<div class="flex items-center flex-1">
							<div class="flex items-center justify-between w-full md:w-auto">
								<a :href="route('home')">
									<span class="sr-only">NameSpace IT</span>
									<img class="h-8 w-auto sm:h-10" src="/image/nmit.png" alt="" />
								</a>
								<div class="-mr-2 flex items-center md:hidden">
									<PopoverButton class="bg-gray-900 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white">
										<span class="sr-only">Open main menu</span>
										<MenuIcon class="h-6 w-6" aria-hidden="true" />
									</PopoverButton>
								</div>
							</div>
							<div class="hidden space-x-8 md:flex md:ml-10">
								<a v-for="item in navigation" :key="item.name" :href="item.href" class="text-base font-medium text-white hover:text-gray-300">{{ item.name }}</a>
							</div>
						</div>
						<div v-if="$page.props.auth.user" class="hidden md:flex md:items-center md:space-x-6">
							<a :href="route('app.dashboard')" class="text-base font-medium text-white hover:text-gray-300"> Dashboard </a>
						</div>
						<div v-else class="hidden md:flex md:items-center md:space-x-6">
							<a :href="route('login')" class="text-base font-medium text-white hover:text-gray-300"> Sign In </a>
							<a :href="route('register')" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700"> Sign Up </a>
						</div>
					</nav>
				</div>

				<transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
					<PopoverPanel focus class="absolute top-0 inset-x-0 p-2 transition transform origin-top md:hidden">
						<div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
							<div class="px-5 pt-4 flex items-center justify-between">
								<div>
									<img class="h-8 w-auto" src="/image/nmit.png" alt="" />
								</div>
								<div class="-mr-2">
									<PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600">
										<span class="sr-only">Close menu</span>
										<XIcon class="h-6 w-6" aria-hidden="true" />
									</PopoverButton>
								</div>
							</div>
							<div class="pt-5 pb-6">
								<div class="px-2 space-y-1">
									<a v-for="item in navigation" :key="item.name" :href="item.href" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
								</div>
								<div class="mt-6 px-5">
									<a href="#" class="block text-center w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700">Sign Up</a>
								</div>
								<div class="mt-6 px-5">
									<p class="text-center text-base font-medium text-gray-500">Have registered? <a href="#" class="text-gray-900 hover:underline">Login</a></p>
								</div>
							</div>
						</div>
					</PopoverPanel>
				</transition>
			</Popover>

			<div class="relative py-16 bg-white overflow-hidden">
				<div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
					<div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
						<svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
							<defs>
								<pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
									<rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
								</pattern>
							</defs>
							<rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
						</svg>
						<svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
							<defs>
								<pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
									<rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
								</pattern>
							</defs>
							<rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
						</svg>
						<svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
							<defs>
								<pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
									<rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
								</pattern>
							</defs>
							<rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
						</svg>
					</div>
				</div>
				<div class="relative px-4 sm:px-6 lg:px-8">
					<div class="text-lg max-w-prose mx-auto">
						<h1>
							<span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Latest Blog</span>
							<span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ blog.title }}</span>
						</h1>
					</div>
					<div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
						<figure>
							<img class="w-full rounded-lg" :src="blog.thumbnail" alt="" width="1310" height="873" />
						</figure>
						<div class="mt-4">
							<a href="#" class="mt-2 py-2 px-4 bg-indigo-500 text-white rounded no-underline">{{ blog.category.name }}</a>
						</div>
						<h2>{{ blog.title }}</h2>
						<p>{{ blog.body }}</p>
					</div>
				</div>
			</div>

			<footer class="bg-white">
				<div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
					<nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
						<div v-for="item in footer_navigation.main" :key="item.name" class="px-5 py-2">
							<a :href="item.href" class="text-base text-gray-500 hover:text-gray-900">
								{{ item.name }}
							</a>
						</div>
					</nav>
					<div class="mt-8 flex justify-center space-x-6">
						<a v-for="item in footer_navigation.social" :key="item.name" :href="item.href" class="text-gray-400 hover:text-gray-500">
							<span class="sr-only">{{ item.name }}</span>
							<component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
						</a>
					</div>
					<p class="mt-8 text-center text-base text-gray-400">&copy; 2022 NameSpace IT Blog, All rights reserved.</p>
				</div>
			</footer>
		</div>
	</div>
</template>

<script>
import {defineComponent, h} from "vue"
import {Popover, PopoverButton, PopoverPanel} from "@headlessui/vue"
import {CloudUploadIcon, CogIcon, LockClosedIcon, MenuIcon, RefreshIcon, ServerIcon, ShieldCheckIcon, XIcon} from "@heroicons/vue/outline"
import {ChevronRightIcon, ExternalLinkIcon} from "@heroicons/vue/solid"
import {Link} from "@inertiajs/inertia-vue3"

const navigation = [
	{name: "Home", href: "#"},
	{name: "Blog", href: "#"},
	{name: "Company", href: "https://namespaceit.com/"},
]

const footer_navigation = {
	main: [
		{name: "About", href: "https://namespaceit.com/"},
		{name: "Blog", href: "#"},
		{name: "Jobs", href: "https://namespaceit.com/career/current_job_opening"},
		{name: "Contact Us", href: "https://namespaceit.com/"},
	],
	social: [
		{
			name: "Facebook",
			href: "#",
			icon: defineComponent({
				render: () =>
					h("svg", {fill: "currentColor", viewBox: "0 0 24 24"}, [
						h("path", {
							"fill-rule": "evenodd",
							d: "M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z",
							"clip-rule": "evenodd",
						}),
					]),
			}),
		},
		{
			name: "Twitter",
			href: "#",
			icon: defineComponent({
				render: () =>
					h("svg", {fill: "currentColor", viewBox: "0 0 24 24"}, [
						h("path", {
							d: "M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84",
						}),
					]),
			}),
		},
		{
			name: "GitHub",
			href: "#",
			icon: defineComponent({
				render: () =>
					h("svg", {fill: "currentColor", viewBox: "0 0 24 24"}, [
						h("path", {
							"fill-rule": "evenodd",
							d: "M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z",
							"clip-rule": "evenodd",
						}),
					]),
			}),
		},
	],
}
export default {
	components: {
		Popover,
		PopoverButton,
		PopoverPanel,
		ChevronRightIcon,
		ExternalLinkIcon,
		MenuIcon,
		XIcon,
		Link,
	},
	props: {
		blog: Object,
	},
	setup() {
		return {
			navigation,
			footer_navigation,
		}
	},
}
</script>
