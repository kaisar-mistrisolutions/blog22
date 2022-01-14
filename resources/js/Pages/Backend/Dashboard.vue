<template>
	<AppLayout>
		<section>
			<div class="max-w-7xl mx-auto flex flex-col justify-center items-center px-4 sm:px-6 md:px-8 mt-20">
				<img class="h-16 w-auto mx-auto" src="/image/nmit.png" alt="" />
				<h2 class="text-xl text-center pt-6 font-semibold text-black-700">Welcome to NameSpace IT Blog Dashboard !</h2>
			</div>
		</section>
	</AppLayout>
</template>
<script>
import AppLayout from "../../Layouts/Backend/AppLayout.vue"

export default {
	components: {
		AppLayout,
	},
	setup() {
		return {}
	},
}
</script>
<style scoped></style>
