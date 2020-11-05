/*
Tablesorter settings/directives
Version: 1.0.1
Original code: Tablesorter docs
Copyright: See notice in adrotate-pro.php
*/
jQuery(function() {
	jQuery("table.manage-ads-main").tablesorter({
		headers: {
			4: { sorter: false },
			6: { sorter: false },
			7: { sorter: false },
		}
	});
	jQuery("table.manage-ads-disabled").tablesorter({
		headers: {
			1: { sorter: false },
			3: { sorter: false },
			4: { sorter: false },
			5: { sorter: false },
		}
	});
	jQuery("table.manage-groups-main").tablesorter({
		headers: {
			2: { sorter: false },
			3: { sorter: false },
			4: { sorter: false },
			5: { sorter: false },
			6: { sorter: false },
		}
	});
});
