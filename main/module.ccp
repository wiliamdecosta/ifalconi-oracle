<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\main" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="hms" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="25" connection="TRBConn" activeCollection="TableParameters" parameterTypeListName="ParameterTypeList" name="ModulGrid" pageSizeLimit="100" wizardCaption=" Grid1 Gallery" wizardGridType="Gallery" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="-" numberOfColumns="5" rowsPerPage="5" recordsNumber="25" dataSource="SELECT * 
FROM v_display_app 
ORDER BY NVL(LISTING_NO,999)" orderBy="LISTING_NO">
			<Components>
				<Panel id="6" visible="True" name="RowOpenTag">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Panel id="7" visible="True" name="RowComponents" wizardAddNbsp="False">
					<Components>
						<ImageLink id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" hrefType="Page" urlType="Relative" preserveParameters="GET" name="module_image" fieldSource="MD_ON" wizardCaption="Module Image" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" hrefSource="f_modul.ccp" PathID="ModulGridRowComponentsmodule_image">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="11" sourceType="DataField" name="p_application_id" source="P_APPLICATION_ID"/>
								<LinkParameter id="12" sourceType="DataField" name="p_application_code" source="CODE"/>
								<LinkParameter id="13" sourceType="DataField" name="module_image" source="MD_ON"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</ImageLink>
						<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" name="code" fieldSource="code" PathID="ModulGridRowComponentscode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Panel id="10" visible="True" name="RowCloseTag">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Gallery Layout" actionCategory="General" id="5"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes>
				<Attribute id="4" name="numberOfColumns" sourceType="Expression" source="5"/>
			</Attributes>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="module.php" forShow="True" url="module.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="module_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
