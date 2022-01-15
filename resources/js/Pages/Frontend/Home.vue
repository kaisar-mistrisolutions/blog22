<template>
	<div class="bg-white">
		<div class="relative overflow-hidden">
			<Popover as="header" class="relative">
				<div class="bg-gray-900 pt-6">
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
									<a :href="route('register')" class="block text-center w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700">Sign Up</a>
								</div>
								<div class="mt-6 px-5">
									<p class="text-center text-base font-medium text-gray-500">Have registered? <a :href="route('login')" class="text-gray-900 hover:underline">Login</a></p>
								</div>
							</div>
						</div>
					</PopoverPanel>
				</transition>
			</Popover>
			<main>
				<div class="pt-10 bg-gray-900 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
					<div class="mx-auto max-w-7xl lg:px-8">
						<div class="lg:grid lg:grid-cols-2 lg:gap-8">
							<div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
								<div class="lg:py-24">
									<a href="https://namespaceit.com/" class="inline-flex items-center text-white bg-black rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
										<span class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gradient-to-r from-teal-500 to-cyan-600 rounded-full">BE CREATIVE WITH</span>
										<span class="ml-4 text-sm">NameSpace IT</span>
										<ChevronRightIcon class="ml-2 w-5 h-5 text-gray-500" aria-hidden="true" />
									</a>
									<h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
										<span class="block">We believe in</span>
										<span class="pb-3 block bg-clip-text text-transparent bg-gradient-to-r from-teal-200 to-cyan-400 sm:pb-5">Quality of Products</span>
									</h1>
									<p class="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl">Namespace IT can do the job and we can do it well. For us, Qualities like honesty, punctuality, a spirit of service, the ability to meet deadlines and many others are most essential.</p>
									<div class="mt-10 sm:mt-12"></div>
								</div>
							</div>
							<div class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
								<div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
									<!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
									<img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/cloud-illustration-teal-cyan.svg" alt="" />
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Blog section -->
				<div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
					<div class="relative">
						<div class="text-center mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
							<h2 class="text-base font-semibold tracking-wider text-cyan-600 uppercase">Latest Blogs</h2>
							<p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">Helpful Resources</p>
						</div>
						<div class="mt-12 mx-auto max-w-md px-4 grid gap-8 sm:max-w-lg sm:px-6 lg:px-8 lg:grid-cols-3 lg:max-w-7xl">
							<div v-for="(blog, index) in blogs.data" :key="index" class="flex flex-col rounded-lg shadow-lg overflow-hidden">
								<div class="flex-shrink-0">
									<Link :href="route('blog.show', blog.slug)">
										<img class="h-48 w-full object-cover" :src="blog.thumbnail" alt="" />
									</Link>
								</div>
								<div class="flex-1 bg-white p-6 flex flex-col justify-between">
									<div class="flex-1">
										<p class="text-sm font-medium text-cyan-600">
											{{ blog.category.name }}
										</p>
										<div class="block mt-2">
											<Link :href="route('blog.show', blog.slug)">
												<p class="text-xl font-semibold text-gray-900">
													{{ blog.title }}
												</p>
												<p class="mt-3 text-base text-gray-500">
													{{ blog.body.length > 120 ? blog.body.substring(0, 120) + "..." : blog.body }}
												</p>
											</Link>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pl-36">
						<Pagination :links="blogs.links" :to="blogs.to" :total="blogs.total" />
					</div>
				</div>
			</main>

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
import Pagination from "../../../js/Components/Pagination.vue"

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
			href: "https://web.facebook.com/namespaceitcom",
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
		Pagination,
	},
	props: {
		blogs: Array,
	},
	setup() {
		return {
			navigation,
			footer_navigation,
		}
	},
}
</script>
