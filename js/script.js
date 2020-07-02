function findAll(selector, event = null, callback) {
	const elements = document.querySelectorAll(selector)

	if(!elements) return

	if(event == null) {
		return elements
	}

	elements.forEach(el => {
		el.addEventListener(event, e => {
			callback({ e, el })
		})
	})
}

function find(selector, event = null, callback) {
	const el = document.querySelector(selector)

	if(!el) return

	if(event == null) {
		return el
	}

	el.addEventListener(event, e => {
		callback({ e, el })
	})
}

function autoComplete(elements) { 
	for(let elementId in elements) {
		const trigger = find(`[data-autocomplete="#${elementId}"]`);

		if(!trigger) return

		trigger.addEventListener('keyup', () => {
			const autoCompleteElement = find(trigger.dataset.autocomplete)

			if(!trigger.value > 0) return autoCompleteElement.classList.remove('autocomplete-results-show') 
			
			autoCompleteElement.classList.add('autocomplete-results-show') 
		})

		findAll(`.autocomplete${trigger.dataset.autocomplete} .result`, 'click', ({ el }) => {
			trigger.value = ''
			el.parentElement.classList.remove('autocomplete-results-show')

			elements[elementId]({ parent: el.parentElement, selected: el })
		})
	}
}

autoComplete({
	skillResults: () => {
		console.log('OK')
	},
	cityResults: () => {
		console.log('OK')
	}
})

findAll('button#seeAnswer', 'click', ({ el }) => {
	el.classList.add('show')
	el.nextElementSibling.classList.add('show')
})

