<?php
/**
 * @author Amir E. Aharoni
 * @copyright Copyright © 2012, Amir E. Aharoni
 * @file
 */

/**
 * @group Language
 * @covers LanguageWa
 */
class LanguageWaTest extends LanguageClassesTestCase {
	/**
	 * @dataProvider providePlural
	 * @covers Language::convertPlural
	 */
	public function testPlural( $result, $value ) {
		$forms = [ 'one', 'other' ];
		$this->assertEquals( $result, $this->getLang()->convertPlural( $value, $forms ) );
	}

	/**
	 * @dataProvider providePlural
	 * @covers Language::getPluralRuleType
	 */
	public function testGetPluralRuleType( $result, $value ) {
		$this->assertEquals( $result, $this->getLang()->getPluralRuleType( $value ) );
	}

	public static function providePlural() {
		return [
			[ 'one', 0 ],
			[ 'one', 1 ],
			[ 'other', 2 ],
		];
	}

	/**
	 * @dataProvider provideTimeAndDate
	 * @covers LanguageWa::timeanddate
	 * @covers LanguageWa::date
	 */
	public function testTimeAndDate( $result, $ts, $format ) {
		$this->assertEquals( $result, $this->getLang()->timeanddate( $ts, false, $format, false ) );
	}

	public static function provideTimeAndDate() {
		return [
			// Simple formats
			[ '01/01/2012 a 00:00', '20120101000000', 'walloon short' ],
			[ '2012-01-01T00:00:00', '20120101000000', 'ISO 8601' ],

			// Every date in the format that requires custom code to format
			[ '1î d\' djanvî 2012 a 00:00', '20120101000000', 'dmy' ],
			[ '2 d\' djanvî 2012 a 00:00', '20120102000000', 'dmy' ],
			[ '3 d\' djanvî 2012 a 00:00', '20120103000000', 'dmy' ],
			[ '4 di djanvî 2012 a 00:00', '20120104000000', 'dmy' ],
			[ '5 di djanvî 2012 a 00:00', '20120105000000', 'dmy' ],
			[ '6 di djanvî 2012 a 00:00', '20120106000000', 'dmy' ],
			[ '7 di djanvî 2012 a 00:00', '20120107000000', 'dmy' ],
			[ '8 di djanvî 2012 a 00:00', '20120108000000', 'dmy' ],
			[ '9 di djanvî 2012 a 00:00', '20120109000000', 'dmy' ],
			[ '10 di djanvî 2012 a 00:00', '20120110000000', 'dmy' ],
			[ '11 di djanvî 2012 a 00:00', '20120111000000', 'dmy' ],
			[ '12 di djanvî 2012 a 00:00', '20120112000000', 'dmy' ],
			[ '13 di djanvî 2012 a 00:00', '20120113000000', 'dmy' ],
			[ '14 di djanvî 2012 a 00:00', '20120114000000', 'dmy' ],
			[ '15 di djanvî 2012 a 00:00', '20120115000000', 'dmy' ],
			[ '16 di djanvî 2012 a 00:00', '20120116000000', 'dmy' ],
			[ '17 di djanvî 2012 a 00:00', '20120117000000', 'dmy' ],
			[ '18 di djanvî 2012 a 00:00', '20120118000000', 'dmy' ],
			[ '19 di djanvî 2012 a 00:00', '20120119000000', 'dmy' ],
			[ '20 d\' djanvî 2012 a 00:00', '20120120000000', 'dmy' ],
			[ '21 di djanvî 2012 a 00:00', '20120121000000', 'dmy' ],
			[ '22 d\' djanvî 2012 a 00:00', '20120122000000', 'dmy' ],
			[ '23 d\' djanvî 2012 a 00:00', '20120123000000', 'dmy' ],
			[ '24 di djanvî 2012 a 00:00', '20120124000000', 'dmy' ],
			[ '25 di djanvî 2012 a 00:00', '20120125000000', 'dmy' ],
			[ '26 di djanvî 2012 a 00:00', '20120126000000', 'dmy' ],
			[ '27 di djanvî 2012 a 00:00', '20120127000000', 'dmy' ],
			[ '28 di djanvî 2012 a 00:00', '20120128000000', 'dmy' ],
			[ '29 di djanvî 2012 a 00:00', '20120129000000', 'dmy' ],
			[ '30 di djanvî 2012 a 00:00', '20120130000000', 'dmy' ],
			[ '31 di djanvî 2012 a 00:00', '20120131000000', 'dmy' ],
			[ '1î d\' fevrî 2012 a 00:00', '20120201000000', 'dmy' ],
			[ '2 d\' fevrî 2012 a 00:00', '20120202000000', 'dmy' ],
			[ '3 d\' fevrî 2012 a 00:00', '20120203000000', 'dmy' ],
			[ '4 di fevrî 2012 a 00:00', '20120204000000', 'dmy' ],
			[ '5 di fevrî 2012 a 00:00', '20120205000000', 'dmy' ],
			[ '6 di fevrî 2012 a 00:00', '20120206000000', 'dmy' ],
			[ '7 di fevrî 2012 a 00:00', '20120207000000', 'dmy' ],
			[ '8 di fevrî 2012 a 00:00', '20120208000000', 'dmy' ],
			[ '9 di fevrî 2012 a 00:00', '20120209000000', 'dmy' ],
			[ '10 di fevrî 2012 a 00:00', '20120210000000', 'dmy' ],
			[ '11 di fevrî 2012 a 00:00', '20120211000000', 'dmy' ],
			[ '12 di fevrî 2012 a 00:00', '20120212000000', 'dmy' ],
			[ '13 di fevrî 2012 a 00:00', '20120213000000', 'dmy' ],
			[ '14 di fevrî 2012 a 00:00', '20120214000000', 'dmy' ],
			[ '15 di fevrî 2012 a 00:00', '20120215000000', 'dmy' ],
			[ '16 di fevrî 2012 a 00:00', '20120216000000', 'dmy' ],
			[ '17 di fevrî 2012 a 00:00', '20120217000000', 'dmy' ],
			[ '18 di fevrî 2012 a 00:00', '20120218000000', 'dmy' ],
			[ '19 di fevrî 2012 a 00:00', '20120219000000', 'dmy' ],
			[ '20 d\' fevrî 2012 a 00:00', '20120220000000', 'dmy' ],
			[ '21 di fevrî 2012 a 00:00', '20120221000000', 'dmy' ],
			[ '22 d\' fevrî 2012 a 00:00', '20120222000000', 'dmy' ],
			[ '23 d\' fevrî 2012 a 00:00', '20120223000000', 'dmy' ],
			[ '24 di fevrî 2012 a 00:00', '20120224000000', 'dmy' ],
			[ '25 di fevrî 2012 a 00:00', '20120225000000', 'dmy' ],
			[ '26 di fevrî 2012 a 00:00', '20120226000000', 'dmy' ],
			[ '27 di fevrî 2012 a 00:00', '20120227000000', 'dmy' ],
			[ '28 di fevrî 2012 a 00:00', '20120228000000', 'dmy' ],
			[ '29 di fevrî 2012 a 00:00', '20120229000000', 'dmy' ],
			[ '1î d\' måss 2012 a 00:00', '20120301000000', 'dmy' ],
			[ '2 d\' måss 2012 a 00:00', '20120302000000', 'dmy' ],
			[ '3 d\' måss 2012 a 00:00', '20120303000000', 'dmy' ],
			[ '4 di måss 2012 a 00:00', '20120304000000', 'dmy' ],
			[ '5 di måss 2012 a 00:00', '20120305000000', 'dmy' ],
			[ '6 di måss 2012 a 00:00', '20120306000000', 'dmy' ],
			[ '7 di måss 2012 a 00:00', '20120307000000', 'dmy' ],
			[ '8 di måss 2012 a 00:00', '20120308000000', 'dmy' ],
			[ '9 di måss 2012 a 00:00', '20120309000000', 'dmy' ],
			[ '10 di måss 2012 a 00:00', '20120310000000', 'dmy' ],
			[ '11 di måss 2012 a 00:00', '20120311000000', 'dmy' ],
			[ '12 di måss 2012 a 00:00', '20120312000000', 'dmy' ],
			[ '13 di måss 2012 a 00:00', '20120313000000', 'dmy' ],
			[ '14 di måss 2012 a 00:00', '20120314000000', 'dmy' ],
			[ '15 di måss 2012 a 00:00', '20120315000000', 'dmy' ],
			[ '16 di måss 2012 a 00:00', '20120316000000', 'dmy' ],
			[ '17 di måss 2012 a 00:00', '20120317000000', 'dmy' ],
			[ '18 di måss 2012 a 00:00', '20120318000000', 'dmy' ],
			[ '19 di måss 2012 a 00:00', '20120319000000', 'dmy' ],
			[ '20 d\' måss 2012 a 00:00', '20120320000000', 'dmy' ],
			[ '21 di måss 2012 a 00:00', '20120321000000', 'dmy' ],
			[ '22 d\' måss 2012 a 00:00', '20120322000000', 'dmy' ],
			[ '23 d\' måss 2012 a 00:00', '20120323000000', 'dmy' ],
			[ '24 di måss 2012 a 00:00', '20120324000000', 'dmy' ],
			[ '25 di måss 2012 a 00:00', '20120325000000', 'dmy' ],
			[ '26 di måss 2012 a 00:00', '20120326000000', 'dmy' ],
			[ '27 di måss 2012 a 00:00', '20120327000000', 'dmy' ],
			[ '28 di måss 2012 a 00:00', '20120328000000', 'dmy' ],
			[ '29 di måss 2012 a 00:00', '20120329000000', 'dmy' ],
			[ '30 di måss 2012 a 00:00', '20120330000000', 'dmy' ],
			[ '31 di måss 2012 a 00:00', '20120331000000', 'dmy' ],
			[ '1î d\' avri 2012 a 00:00', '20120401000000', 'dmy' ],
			[ '2 d\' avri 2012 a 00:00', '20120402000000', 'dmy' ],
			[ '3 d\' avri 2012 a 00:00', '20120403000000', 'dmy' ],
			[ '4 d\' avri 2012 a 00:00', '20120404000000', 'dmy' ],
			[ '5 d\' avri 2012 a 00:00', '20120405000000', 'dmy' ],
			[ '6 d\' avri 2012 a 00:00', '20120406000000', 'dmy' ],
			[ '7 d\' avri 2012 a 00:00', '20120407000000', 'dmy' ],
			[ '8 d\' avri 2012 a 00:00', '20120408000000', 'dmy' ],
			[ '9 d\' avri 2012 a 00:00', '20120409000000', 'dmy' ],
			[ '10 d\' avri 2012 a 00:00', '20120410000000', 'dmy' ],
			[ '11 d\' avri 2012 a 00:00', '20120411000000', 'dmy' ],
			[ '12 d\' avri 2012 a 00:00', '20120412000000', 'dmy' ],
			[ '13 d\' avri 2012 a 00:00', '20120413000000', 'dmy' ],
			[ '14 d\' avri 2012 a 00:00', '20120414000000', 'dmy' ],
			[ '15 d\' avri 2012 a 00:00', '20120415000000', 'dmy' ],
			[ '16 d\' avri 2012 a 00:00', '20120416000000', 'dmy' ],
			[ '17 d\' avri 2012 a 00:00', '20120417000000', 'dmy' ],
			[ '18 d\' avri 2012 a 00:00', '20120418000000', 'dmy' ],
			[ '19 d\' avri 2012 a 00:00', '20120419000000', 'dmy' ],
			[ '20 d\' avri 2012 a 00:00', '20120420000000', 'dmy' ],
			[ '21 d\' avri 2012 a 00:00', '20120421000000', 'dmy' ],
			[ '22 d\' avri 2012 a 00:00', '20120422000000', 'dmy' ],
			[ '23 d\' avri 2012 a 00:00', '20120423000000', 'dmy' ],
			[ '24 d\' avri 2012 a 00:00', '20120424000000', 'dmy' ],
			[ '25 d\' avri 2012 a 00:00', '20120425000000', 'dmy' ],
			[ '26 d\' avri 2012 a 00:00', '20120426000000', 'dmy' ],
			[ '27 d\' avri 2012 a 00:00', '20120427000000', 'dmy' ],
			[ '28 d\' avri 2012 a 00:00', '20120428000000', 'dmy' ],
			[ '29 d\' avri 2012 a 00:00', '20120429000000', 'dmy' ],
			[ '30 d\' avri 2012 a 00:00', '20120430000000', 'dmy' ],
			[ '1î d\' may 2012 a 00:00', '20120501000000', 'dmy' ],
			[ '2 d\' may 2012 a 00:00', '20120502000000', 'dmy' ],
			[ '3 d\' may 2012 a 00:00', '20120503000000', 'dmy' ],
			[ '4 di may 2012 a 00:00', '20120504000000', 'dmy' ],
			[ '5 di may 2012 a 00:00', '20120505000000', 'dmy' ],
			[ '6 di may 2012 a 00:00', '20120506000000', 'dmy' ],
			[ '7 di may 2012 a 00:00', '20120507000000', 'dmy' ],
			[ '8 di may 2012 a 00:00', '20120508000000', 'dmy' ],
			[ '9 di may 2012 a 00:00', '20120509000000', 'dmy' ],
			[ '10 di may 2012 a 00:00', '20120510000000', 'dmy' ],
			[ '11 di may 2012 a 00:00', '20120511000000', 'dmy' ],
			[ '12 di may 2012 a 00:00', '20120512000000', 'dmy' ],
			[ '13 di may 2012 a 00:00', '20120513000000', 'dmy' ],
			[ '14 di may 2012 a 00:00', '20120514000000', 'dmy' ],
			[ '15 di may 2012 a 00:00', '20120515000000', 'dmy' ],
			[ '16 di may 2012 a 00:00', '20120516000000', 'dmy' ],
			[ '17 di may 2012 a 00:00', '20120517000000', 'dmy' ],
			[ '18 di may 2012 a 00:00', '20120518000000', 'dmy' ],
			[ '19 di may 2012 a 00:00', '20120519000000', 'dmy' ],
			[ '20 d\' may 2012 a 00:00', '20120520000000', 'dmy' ],
			[ '21 di may 2012 a 00:00', '20120521000000', 'dmy' ],
			[ '22 d\' may 2012 a 00:00', '20120522000000', 'dmy' ],
			[ '23 d\' may 2012 a 00:00', '20120523000000', 'dmy' ],
			[ '24 di may 2012 a 00:00', '20120524000000', 'dmy' ],
			[ '25 di may 2012 a 00:00', '20120525000000', 'dmy' ],
			[ '26 di may 2012 a 00:00', '20120526000000', 'dmy' ],
			[ '27 di may 2012 a 00:00', '20120527000000', 'dmy' ],
			[ '28 di may 2012 a 00:00', '20120528000000', 'dmy' ],
			[ '29 di may 2012 a 00:00', '20120529000000', 'dmy' ],
			[ '30 di may 2012 a 00:00', '20120530000000', 'dmy' ],
			[ '31 di may 2012 a 00:00', '20120531000000', 'dmy' ],
			[ '1î d\' djun 2012 a 00:00', '20120601000000', 'dmy' ],
			[ '2 d\' djun 2012 a 00:00', '20120602000000', 'dmy' ],
			[ '3 d\' djun 2012 a 00:00', '20120603000000', 'dmy' ],
			[ '4 di djun 2012 a 00:00', '20120604000000', 'dmy' ],
			[ '5 di djun 2012 a 00:00', '20120605000000', 'dmy' ],
			[ '6 di djun 2012 a 00:00', '20120606000000', 'dmy' ],
			[ '7 di djun 2012 a 00:00', '20120607000000', 'dmy' ],
			[ '8 di djun 2012 a 00:00', '20120608000000', 'dmy' ],
			[ '9 di djun 2012 a 00:00', '20120609000000', 'dmy' ],
			[ '10 di djun 2012 a 00:00', '20120610000000', 'dmy' ],
			[ '11 di djun 2012 a 00:00', '20120611000000', 'dmy' ],
			[ '12 di djun 2012 a 00:00', '20120612000000', 'dmy' ],
			[ '13 di djun 2012 a 00:00', '20120613000000', 'dmy' ],
			[ '14 di djun 2012 a 00:00', '20120614000000', 'dmy' ],
			[ '15 di djun 2012 a 00:00', '20120615000000', 'dmy' ],
			[ '16 di djun 2012 a 00:00', '20120616000000', 'dmy' ],
			[ '17 di djun 2012 a 00:00', '20120617000000', 'dmy' ],
			[ '18 di djun 2012 a 00:00', '20120618000000', 'dmy' ],
			[ '19 di djun 2012 a 00:00', '20120619000000', 'dmy' ],
			[ '20 d\' djun 2012 a 00:00', '20120620000000', 'dmy' ],
			[ '21 di djun 2012 a 00:00', '20120621000000', 'dmy' ],
			[ '22 d\' djun 2012 a 00:00', '20120622000000', 'dmy' ],
			[ '23 d\' djun 2012 a 00:00', '20120623000000', 'dmy' ],
			[ '24 di djun 2012 a 00:00', '20120624000000', 'dmy' ],
			[ '25 di djun 2012 a 00:00', '20120625000000', 'dmy' ],
			[ '26 di djun 2012 a 00:00', '20120626000000', 'dmy' ],
			[ '27 di djun 2012 a 00:00', '20120627000000', 'dmy' ],
			[ '28 di djun 2012 a 00:00', '20120628000000', 'dmy' ],
			[ '29 di djun 2012 a 00:00', '20120629000000', 'dmy' ],
			[ '30 di djun 2012 a 00:00', '20120630000000', 'dmy' ],
			[ '1î d\' djulete 2012 a 00:00', '20120701000000', 'dmy' ],
			[ '2 d\' djulete 2012 a 00:00', '20120702000000', 'dmy' ],
			[ '3 d\' djulete 2012 a 00:00', '20120703000000', 'dmy' ],
			[ '4 di djulete 2012 a 00:00', '20120704000000', 'dmy' ],
			[ '5 di djulete 2012 a 00:00', '20120705000000', 'dmy' ],
			[ '6 di djulete 2012 a 00:00', '20120706000000', 'dmy' ],
			[ '7 di djulete 2012 a 00:00', '20120707000000', 'dmy' ],
			[ '8 di djulete 2012 a 00:00', '20120708000000', 'dmy' ],
			[ '9 di djulete 2012 a 00:00', '20120709000000', 'dmy' ],
			[ '10 di djulete 2012 a 00:00', '20120710000000', 'dmy' ],
			[ '11 di djulete 2012 a 00:00', '20120711000000', 'dmy' ],
			[ '12 di djulete 2012 a 00:00', '20120712000000', 'dmy' ],
			[ '13 di djulete 2012 a 00:00', '20120713000000', 'dmy' ],
			[ '14 di djulete 2012 a 00:00', '20120714000000', 'dmy' ],
			[ '15 di djulete 2012 a 00:00', '20120715000000', 'dmy' ],
			[ '16 di djulete 2012 a 00:00', '20120716000000', 'dmy' ],
			[ '17 di djulete 2012 a 00:00', '20120717000000', 'dmy' ],
			[ '18 di djulete 2012 a 00:00', '20120718000000', 'dmy' ],
			[ '19 di djulete 2012 a 00:00', '20120719000000', 'dmy' ],
			[ '20 d\' djulete 2012 a 00:00', '20120720000000', 'dmy' ],
			[ '21 di djulete 2012 a 00:00', '20120721000000', 'dmy' ],
			[ '22 d\' djulete 2012 a 00:00', '20120722000000', 'dmy' ],
			[ '23 d\' djulete 2012 a 00:00', '20120723000000', 'dmy' ],
			[ '24 di djulete 2012 a 00:00', '20120724000000', 'dmy' ],
			[ '25 di djulete 2012 a 00:00', '20120725000000', 'dmy' ],
			[ '26 di djulete 2012 a 00:00', '20120726000000', 'dmy' ],
			[ '27 di djulete 2012 a 00:00', '20120727000000', 'dmy' ],
			[ '28 di djulete 2012 a 00:00', '20120728000000', 'dmy' ],
			[ '29 di djulete 2012 a 00:00', '20120729000000', 'dmy' ],
			[ '30 di djulete 2012 a 00:00', '20120730000000', 'dmy' ],
			[ '31 di djulete 2012 a 00:00', '20120731000000', 'dmy' ],
			[ '1î d\' awousse 2012 a 00:00', '20120801000000', 'dmy' ],
			[ '2 d\' awousse 2012 a 00:00', '20120802000000', 'dmy' ],
			[ '3 d\' awousse 2012 a 00:00', '20120803000000', 'dmy' ],
			[ '4 d\' awousse 2012 a 00:00', '20120804000000', 'dmy' ],
			[ '5 d\' awousse 2012 a 00:00', '20120805000000', 'dmy' ],
			[ '6 d\' awousse 2012 a 00:00', '20120806000000', 'dmy' ],
			[ '7 d\' awousse 2012 a 00:00', '20120807000000', 'dmy' ],
			[ '8 d\' awousse 2012 a 00:00', '20120808000000', 'dmy' ],
			[ '9 d\' awousse 2012 a 00:00', '20120809000000', 'dmy' ],
			[ '10 d\' awousse 2012 a 00:00', '20120810000000', 'dmy' ],
			[ '11 d\' awousse 2012 a 00:00', '20120811000000', 'dmy' ],
			[ '12 d\' awousse 2012 a 00:00', '20120812000000', 'dmy' ],
			[ '13 d\' awousse 2012 a 00:00', '20120813000000', 'dmy' ],
			[ '14 d\' awousse 2012 a 00:00', '20120814000000', 'dmy' ],
			[ '15 d\' awousse 2012 a 00:00', '20120815000000', 'dmy' ],
			[ '16 d\' awousse 2012 a 00:00', '20120816000000', 'dmy' ],
			[ '17 d\' awousse 2012 a 00:00', '20120817000000', 'dmy' ],
			[ '18 d\' awousse 2012 a 00:00', '20120818000000', 'dmy' ],
			[ '19 d\' awousse 2012 a 00:00', '20120819000000', 'dmy' ],
			[ '20 d\' awousse 2012 a 00:00', '20120820000000', 'dmy' ],
			[ '21 d\' awousse 2012 a 00:00', '20120821000000', 'dmy' ],
			[ '22 d\' awousse 2012 a 00:00', '20120822000000', 'dmy' ],
			[ '23 d\' awousse 2012 a 00:00', '20120823000000', 'dmy' ],
			[ '24 d\' awousse 2012 a 00:00', '20120824000000', 'dmy' ],
			[ '25 d\' awousse 2012 a 00:00', '20120825000000', 'dmy' ],
			[ '26 d\' awousse 2012 a 00:00', '20120826000000', 'dmy' ],
			[ '27 d\' awousse 2012 a 00:00', '20120827000000', 'dmy' ],
			[ '28 d\' awousse 2012 a 00:00', '20120828000000', 'dmy' ],
			[ '29 d\' awousse 2012 a 00:00', '20120829000000', 'dmy' ],
			[ '30 d\' awousse 2012 a 00:00', '20120830000000', 'dmy' ],
			[ '31 d\' awousse 2012 a 00:00', '20120831000000', 'dmy' ],
			[ '1î d\' setimbe 2012 a 00:00', '20120901000000', 'dmy' ],
			[ '2 d\' setimbe 2012 a 00:00', '20120902000000', 'dmy' ],
			[ '3 d\' setimbe 2012 a 00:00', '20120903000000', 'dmy' ],
			[ '4 di setimbe 2012 a 00:00', '20120904000000', 'dmy' ],
			[ '5 di setimbe 2012 a 00:00', '20120905000000', 'dmy' ],
			[ '6 di setimbe 2012 a 00:00', '20120906000000', 'dmy' ],
			[ '7 di setimbe 2012 a 00:00', '20120907000000', 'dmy' ],
			[ '8 di setimbe 2012 a 00:00', '20120908000000', 'dmy' ],
			[ '9 di setimbe 2012 a 00:00', '20120909000000', 'dmy' ],
			[ '10 di setimbe 2012 a 00:00', '20120910000000', 'dmy' ],
			[ '11 di setimbe 2012 a 00:00', '20120911000000', 'dmy' ],
			[ '12 di setimbe 2012 a 00:00', '20120912000000', 'dmy' ],
			[ '13 di setimbe 2012 a 00:00', '20120913000000', 'dmy' ],
			[ '14 di setimbe 2012 a 00:00', '20120914000000', 'dmy' ],
			[ '15 di setimbe 2012 a 00:00', '20120915000000', 'dmy' ],
			[ '16 di setimbe 2012 a 00:00', '20120916000000', 'dmy' ],
			[ '17 di setimbe 2012 a 00:00', '20120917000000', 'dmy' ],
			[ '18 di setimbe 2012 a 00:00', '20120918000000', 'dmy' ],
			[ '19 di setimbe 2012 a 00:00', '20120919000000', 'dmy' ],
			[ '20 d\' setimbe 2012 a 00:00', '20120920000000', 'dmy' ],
			[ '21 di setimbe 2012 a 00:00', '20120921000000', 'dmy' ],
			[ '22 d\' setimbe 2012 a 00:00', '20120922000000', 'dmy' ],
			[ '23 d\' setimbe 2012 a 00:00', '20120923000000', 'dmy' ],
			[ '24 di setimbe 2012 a 00:00', '20120924000000', 'dmy' ],
			[ '25 di setimbe 2012 a 00:00', '20120925000000', 'dmy' ],
			[ '26 di setimbe 2012 a 00:00', '20120926000000', 'dmy' ],
			[ '27 di setimbe 2012 a 00:00', '20120927000000', 'dmy' ],
			[ '28 di setimbe 2012 a 00:00', '20120928000000', 'dmy' ],
			[ '29 di setimbe 2012 a 00:00', '20120929000000', 'dmy' ],
			[ '30 di setimbe 2012 a 00:00', '20120930000000', 'dmy' ],
			[ '1î d\' octôbe 2012 a 00:00', '20121001000000', 'dmy' ],
			[ '2 d\' octôbe 2012 a 00:00', '20121002000000', 'dmy' ],
			[ '3 d\' octôbe 2012 a 00:00', '20121003000000', 'dmy' ],
			[ '4 d\' octôbe 2012 a 00:00', '20121004000000', 'dmy' ],
			[ '5 d\' octôbe 2012 a 00:00', '20121005000000', 'dmy' ],
			[ '6 d\' octôbe 2012 a 00:00', '20121006000000', 'dmy' ],
			[ '7 d\' octôbe 2012 a 00:00', '20121007000000', 'dmy' ],
			[ '8 d\' octôbe 2012 a 00:00', '20121008000000', 'dmy' ],
			[ '9 d\' octôbe 2012 a 00:00', '20121009000000', 'dmy' ],
			[ '10 d\' octôbe 2012 a 00:00', '20121010000000', 'dmy' ],
			[ '11 d\' octôbe 2012 a 00:00', '20121011000000', 'dmy' ],
			[ '12 d\' octôbe 2012 a 00:00', '20121012000000', 'dmy' ],
			[ '13 d\' octôbe 2012 a 00:00', '20121013000000', 'dmy' ],
			[ '14 d\' octôbe 2012 a 00:00', '20121014000000', 'dmy' ],
			[ '15 d\' octôbe 2012 a 00:00', '20121015000000', 'dmy' ],
			[ '16 d\' octôbe 2012 a 00:00', '20121016000000', 'dmy' ],
			[ '17 d\' octôbe 2012 a 00:00', '20121017000000', 'dmy' ],
			[ '18 d\' octôbe 2012 a 00:00', '20121018000000', 'dmy' ],
			[ '19 d\' octôbe 2012 a 00:00', '20121019000000', 'dmy' ],
			[ '20 d\' octôbe 2012 a 00:00', '20121020000000', 'dmy' ],
			[ '21 d\' octôbe 2012 a 00:00', '20121021000000', 'dmy' ],
			[ '22 d\' octôbe 2012 a 00:00', '20121022000000', 'dmy' ],
			[ '23 d\' octôbe 2012 a 00:00', '20121023000000', 'dmy' ],
			[ '24 d\' octôbe 2012 a 00:00', '20121024000000', 'dmy' ],
			[ '25 d\' octôbe 2012 a 00:00', '20121025000000', 'dmy' ],
			[ '26 d\' octôbe 2012 a 00:00', '20121026000000', 'dmy' ],
			[ '27 d\' octôbe 2012 a 00:00', '20121027000000', 'dmy' ],
			[ '28 d\' octôbe 2012 a 00:00', '20121028000000', 'dmy' ],
			[ '29 d\' octôbe 2012 a 00:00', '20121029000000', 'dmy' ],
			[ '30 d\' octôbe 2012 a 00:00', '20121030000000', 'dmy' ],
			[ '31 d\' octôbe 2012 a 00:00', '20121031000000', 'dmy' ],
			[ '1î d\' nôvimbe 2012 a 00:00', '20121101000000', 'dmy' ],
			[ '2 d\' nôvimbe 2012 a 00:00', '20121102000000', 'dmy' ],
			[ '3 d\' nôvimbe 2012 a 00:00', '20121103000000', 'dmy' ],
			[ '4 di nôvimbe 2012 a 00:00', '20121104000000', 'dmy' ],
			[ '5 di nôvimbe 2012 a 00:00', '20121105000000', 'dmy' ],
			[ '6 di nôvimbe 2012 a 00:00', '20121106000000', 'dmy' ],
			[ '7 di nôvimbe 2012 a 00:00', '20121107000000', 'dmy' ],
			[ '8 di nôvimbe 2012 a 00:00', '20121108000000', 'dmy' ],
			[ '9 di nôvimbe 2012 a 00:00', '20121109000000', 'dmy' ],
			[ '10 di nôvimbe 2012 a 00:00', '20121110000000', 'dmy' ],
			[ '11 di nôvimbe 2012 a 00:00', '20121111000000', 'dmy' ],
			[ '12 di nôvimbe 2012 a 00:00', '20121112000000', 'dmy' ],
			[ '13 di nôvimbe 2012 a 00:00', '20121113000000', 'dmy' ],
			[ '14 di nôvimbe 2012 a 00:00', '20121114000000', 'dmy' ],
			[ '15 di nôvimbe 2012 a 00:00', '20121115000000', 'dmy' ],
			[ '16 di nôvimbe 2012 a 00:00', '20121116000000', 'dmy' ],
			[ '17 di nôvimbe 2012 a 00:00', '20121117000000', 'dmy' ],
			[ '18 di nôvimbe 2012 a 00:00', '20121118000000', 'dmy' ],
			[ '19 di nôvimbe 2012 a 00:00', '20121119000000', 'dmy' ],
			[ '20 d\' nôvimbe 2012 a 00:00', '20121120000000', 'dmy' ],
			[ '21 di nôvimbe 2012 a 00:00', '20121121000000', 'dmy' ],
			[ '22 d\' nôvimbe 2012 a 00:00', '20121122000000', 'dmy' ],
			[ '23 d\' nôvimbe 2012 a 00:00', '20121123000000', 'dmy' ],
			[ '24 di nôvimbe 2012 a 00:00', '20121124000000', 'dmy' ],
			[ '25 di nôvimbe 2012 a 00:00', '20121125000000', 'dmy' ],
			[ '26 di nôvimbe 2012 a 00:00', '20121126000000', 'dmy' ],
			[ '27 di nôvimbe 2012 a 00:00', '20121127000000', 'dmy' ],
			[ '28 di nôvimbe 2012 a 00:00', '20121128000000', 'dmy' ],
			[ '29 di nôvimbe 2012 a 00:00', '20121129000000', 'dmy' ],
			[ '30 di nôvimbe 2012 a 00:00', '20121130000000', 'dmy' ],
			[ '1î d\' decimbe 2012 a 00:00', '20121201000000', 'dmy' ],
			[ '2 d\' decimbe 2012 a 00:00', '20121202000000', 'dmy' ],
			[ '3 d\' decimbe 2012 a 00:00', '20121203000000', 'dmy' ],
			[ '4 di decimbe 2012 a 00:00', '20121204000000', 'dmy' ],
			[ '5 di decimbe 2012 a 00:00', '20121205000000', 'dmy' ],
			[ '6 di decimbe 2012 a 00:00', '20121206000000', 'dmy' ],
			[ '7 di decimbe 2012 a 00:00', '20121207000000', 'dmy' ],
			[ '8 di decimbe 2012 a 00:00', '20121208000000', 'dmy' ],
			[ '9 di decimbe 2012 a 00:00', '20121209000000', 'dmy' ],
			[ '10 di decimbe 2012 a 00:00', '20121210000000', 'dmy' ],
			[ '11 di decimbe 2012 a 00:00', '20121211000000', 'dmy' ],
			[ '12 di decimbe 2012 a 00:00', '20121212000000', 'dmy' ],
			[ '13 di decimbe 2012 a 00:00', '20121213000000', 'dmy' ],
			[ '14 di decimbe 2012 a 00:00', '20121214000000', 'dmy' ],
			[ '15 di decimbe 2012 a 00:00', '20121215000000', 'dmy' ],
			[ '16 di decimbe 2012 a 00:00', '20121216000000', 'dmy' ],
			[ '17 di decimbe 2012 a 00:00', '20121217000000', 'dmy' ],
			[ '18 di decimbe 2012 a 00:00', '20121218000000', 'dmy' ],
			[ '19 di decimbe 2012 a 00:00', '20121219000000', 'dmy' ],
			[ '20 d\' decimbe 2012 a 00:00', '20121220000000', 'dmy' ],
			[ '21 di decimbe 2012 a 00:00', '20121221000000', 'dmy' ],
			[ '22 d\' decimbe 2012 a 00:00', '20121222000000', 'dmy' ],
			[ '23 d\' decimbe 2012 a 00:00', '20121223000000', 'dmy' ],
			[ '24 di decimbe 2012 a 00:00', '20121224000000', 'dmy' ],
			[ '25 di decimbe 2012 a 00:00', '20121225000000', 'dmy' ],
			[ '26 di decimbe 2012 a 00:00', '20121226000000', 'dmy' ],
			[ '27 di decimbe 2012 a 00:00', '20121227000000', 'dmy' ],
			[ '28 di decimbe 2012 a 00:00', '20121228000000', 'dmy' ],
			[ '29 di decimbe 2012 a 00:00', '20121229000000', 'dmy' ],
			[ '30 di decimbe 2012 a 00:00', '20121230000000', 'dmy' ],
			[ '31 di decimbe 2012 a 00:00', '20121231000000', 'dmy' ],
		];
	}

}
