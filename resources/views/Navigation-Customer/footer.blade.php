<!-- Footer Start-->
<footer class="footer mt-auto">
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="footer-copyright-text">
						<p class="mb-0">2023, <strong>ElectraNerve</strong>. All rights reserved. Powered by ElectraNerve</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer End-->
	
	
	<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/OwlCarousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>	
	<script src="{{ asset('vendor/mixitup/dist/mixitup.min.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>

	<script src="{{ asset('js/night-mode.js') }}"></script>

	<script>
    document.addEventListener('DOMContentLoaded', function () {
        var containerEl = document.querySelector('[data-ref="event-filter-content"]');
        var mixer = mixitup(containerEl, {
            selectors: {
                target: '[data-ref="mixitup-target"]'
            }
        });
    });
</script>

	

</body>
</html>