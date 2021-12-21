document.addEventListener('alpine:init', () => {
	Alpine.directive('ondatepick', (el,{ modifiers } ) => {
		
		$(el).datepicker().on('changeDate',(e) => {
			
			let eventName = 'input';
			
			e.target.dispatchEvent(new CustomEvent(eventName,{ detail: moment(e.date).format("YYYY-MM-DD"), bubbles: true }));
			if (modifiers.length > 0) {
				eventName = modifiers[0];
				e.target.dispatchEvent(new CustomEvent(eventName,{ detail: moment(e.date).format("YYYY-MM-DD"), bubbles: true }));
			}
		});
	});
	
	Alpine.directive('onselect2', (el,{ modifiers } ) => {
		
		$(el).on('select2:select',(e) => {
			let eventName = 'change';
			el.dispatchEvent(new CustomEvent(eventName,{ detail: e.target.value, bubbles: true }));
			if (modifiers.length > 0) {
				eventName = modifiers[0];
				el.dispatchEvent(new CustomEvent(eventName,{ detail: e.target.value, bubbles: true }));
			}
		})
	});
	
	
	
	
	Alpine.magic('selectData', (el) => {
		return attr => el.options[el.selectedIndex].getAttribute("data-"+attr)
	});
	
	Alpine.magic('attrData', (el) => {
		return attr => el.getAttribute("data-"+attr)
	});
	
});