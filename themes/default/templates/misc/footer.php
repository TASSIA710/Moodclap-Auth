
		</div>

		<script type="text/javascript">
		const STAT_TIME_TOTAL = <?= microtime(true)*1000 - $MOODCLAP_START; ?>;
		const STAT_TIME_SQL = <?= Database::getQueryTime(); ?>;
		const STAT_TIME_PHP = STAT_TIME_TOTAL - STAT_TIME_SQL;
		const STAT_COUNT_QUERIES = <?= Database::getQueryCount(); ?>;

		document.getElementById('stat_time_total').innerHTML = Math.round(STAT_TIME_TOTAL*100)/100 + 'ms';
		document.getElementById('stat_time_php').innerHTML = Math.round(STAT_TIME_SQL*100)/100 + 'ms';
		document.getElementById('stat_time_sql').innerHTML = Math.round(STAT_TIME_PHP*100)/100 + 'ms';
		document.getElementById('stat_count_queries').innerHTML = STAT_COUNT_QUERIES;
		</script>

	</body>
</html>
