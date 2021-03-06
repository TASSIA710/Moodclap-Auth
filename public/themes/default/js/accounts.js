
/* Apply Filters */
function applyFilters() {

	const data = {};

	launchAJAX(AUTH_CONFIG.ROOT + 'api/accounts/get/', data, function(res, status, text) {
		if (status !== 200) return false;

		const x = document.getElementById('accounts');
		x.querySelectorAll('p').forEach(function(e) {
			e.remove();
		});

		for (let i = 0; i < res.accounts.length; i++) {
			let p = document.createElement('P');
			p.classList.add('text-muted');
			p.classList.add('border-bottom');
			p.classList.add('py-1');
			p.classList.add('mb-0');
			p.innerHTML = res.accounts[i].AccountID;
			x.append(p);

			p = document.createElement('P');
			p.classList.add('text-muted');
			p.classList.add('border-bottom');
			p.classList.add('py-1');
			p.classList.add('mb-0');
			p.innerHTML = '<a href="' + AUTH_CONFIG.ROOT + 'account/' + res.accounts[i].Username + '/">' + res.accounts[i].Username + '</a>';
			x.append(p);

			p = document.createElement('P');
			p.classList.add('text-muted');
			p.classList.add('border-bottom');
			p.classList.add('py-1');
			p.classList.add('mb-0');
			p.innerHTML = '<a href="' + AUTH_CONFIG.ROOT + 'group/' + res.accounts[i].GroupNameID + '/">' + res.accounts[i].GroupName + '</a>';
			x.append(p);

			p = document.createElement('P');
			p.classList.add('text-muted');
			p.classList.add('border-bottom');
			p.classList.add('py-1');
			p.classList.add('mb-0');
			p.classList.add('timestamped');
			p.setAttribute('data-timestamp', (res.accounts[i].LastVisit * 1000).toString());
			p.innerHTML = relativeTime(res.accounts[i].LastVisit * 1000);
			x.append(p);

			p = document.createElement('P');
			p.classList.add('text-muted');
			p.classList.add('border-bottom');
			p.classList.add('py-1');
			p.classList.add('mb-0');
			p.classList.add('timestamped');
			p.setAttribute('data-timestamp', (res.accounts[i].FirstVisit * 1000).toString());
			p.innerHTML = relativeTime(res.accounts[i].FirstVisit * 1000);
			x.append(p);
		}

		return true;
	});
}
/* Apply Filters */



/* Reset Filters */
function resetFilters() {
	alert('WIP');
}
/* Reset Filters */



/* Load Event */
window.addEventListener('load', function() {
	applyFilters();
});
/* Load Event */
